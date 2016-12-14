<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 5/5/16
 * Time: 9:20 PM
 */

namespace App\Http\Controllers;

use Input;
use Redirect;
use Lang;
use View;
use App;
use App\Blocks\RoomChange\Tabs;
use App\Blocks\RoomChange\Grid;
use Auth;
use Session;
use DB;
class RoomChangeController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->setGridId('roomcharges');
        $this->setTabsId('roomcharges');
        $this->setResource('App\Models\Mvp');
        $this->setSingularKey('roomcharges');
        $this->setPluralKey('works');
        $this->setModelClass('App\Models\Mvp');
    }


    /**
     * @return \Illuminate\View\View
     */
    public function indexWithoutParam()
    {
        $grid = new Grid($this->getGridId(), $this->getResource(), $this->getPluralKey());
        $this->setGrid($grid);
        $this->setPageTitle('Quản Lý Nhân Viên');
        return $this->loadGrid();

    }


    /**
     * @param null $filter
     * @return \Illuminate\View\View
     */
    public function index($filter = null)
    {
        $grid = new Grid($this->getGridId(), $this->getResource(), $this->getPluralKey());
        $this->setGrid($grid);
        $this->setPageTitle('Quản Lý Nhân Viên');
        return $this->loadGrid();
    }


    /**
     * grid controller
     * @param $filter
     */
    public function grid($filter)
    {   $params = $this->_parseFilter($filter);
        $gridReview = new GridReview('works', 'App\Models\Work', 'works', $params);
        $this->setGrid($gridReview);
        return $this->loadGridReview();

    }


    /**
     * export excel
     * @param $type
     */
    public function export($type)
    {
        $param  = Session::get('param');

        $thang_id = $param['filter']['thang_id'];
        if(!isset($thang_id))
            return ;

        $thang = App\Helpers\Month::getThangByID($thang_id);
        $thang = 'DSNVTB '. str_replace("/",'-',$thang);
//        var_dump($thang);die();
        $grid = new GridReview('Export All', $this->getResource(),  $thang,$param);
        $this->exportFile($type, $grid);
    }



    /**
     * edit customer form
     * @param $id
     * @return $this|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data = App\Models\User::find($id);
        \Session::put('user_data',$data);
        if (isset($data['errors'])) {
            return Redirect::route('users.list')
                ->with('error', $data['errors'][0]['message'])
                ->withInput();
        }

        $roles = $data->roles;
        $data = $data->toArray();
        $i = 0;
        foreach ($roles as $role) {
            $data['permissions'][$i]['_id'] = $role->_id;
            $data['permissions'][$i++]['name'] = $role->name;
        }
        $taikhoan_phongphutrach = DB::table('taikhoan_phongphutrach')->where('user_id','=',$id)->get();

        if(count($taikhoan_phongphutrach)) {
            foreach($taikhoan_phongphutrach as $key => $value) {
                $data['room_change'][] = $value->room_id;
            }
        }

        App::instance($this->getTabsId(), $data);
        $this->setPageTitle(Lang::get('users.edit_user') . ' # ' . $data['first_name'] . ' ' . $data['last_name']);
        $tabs = new Tabs($this->getTabsId());
        $this->setTabs($tabs);
        return $this->loadTabs();

    }

    /**
     * create or update customer
     * @param null $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function save($id = null)
    {
        $input = $this->_processData(Input::all());
        $id = $input['_id'];
        if(isset($input['room_change'])) {
            DB::table('taikhoan_phongphutrach')->where('user_id','=',$id)->delete();
            foreach ( $input['room_change'] as $key =>$value ) {
                $tmp['user_id'] = $id;
                $tmp['room_id'] = $value;
                $taikhoan_phongphutrach = new App\Models\TaiKhoanPhongPhuTrach($tmp);
                $taikhoan_phongphutrach->save();
            }
        }

        if (Input::get('tab')) {
            $id = $input['_id'];
            return Redirect::route('roomcharges.edit', [$id, 'tab' => Input::get('tab')])->with('success',
                Lang::get('messages.the_user_has_been_saved'));
        } else {
            return Redirect::route('roomcharges.list')
                ->with('success', Lang::get('messages.the_user_has_been_saved'));
        }

    }




}