<?php namespace App\Http\Controllers;

use Input;
use App\Blocks\User\Grid;
use App\Blocks\User\GridExport;
use Redirect;
use Lang;
use App;
use App\Blocks\User\Tabs as UserTabs;
use DB;
class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->setGridId('users');
        $this->setTabsId('user');
        $this->setResource('App\Models\User');
        $this->setSingularKey('user');
        $this->setPluralKey('users');
        $this->setModelClass('App\Models\User');
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
        $params = $this->_parseFilter($filter);
        $grid = new Grid($this->getGridId(), $this->getResource(), $this->getPluralKey(), $params);
        $this->setGrid($grid);
        $this->setPageTitle('Quản Lý Nhân Viên');
        return $this->loadGrid();
    }


    /**
     * grid controller
     * @param $filter
     */
    public function grid($filter)
    {
        $params = $this->_parseFilter($filter);
        $grid = new Grid($this->getGridId(), $this->getResource(), $this->getPluralKey(), $params);
        $this->setGrid($grid);
        echo $this->loadAjaxGrid();
    }


    /**
     * export excel
     * @param $type
     */
    public function export($type)
    {
        $grid = new GridExport('Export All', $this->getResource(), 'Export all');
        $this->exportFile($type, $grid);
    }


    /**
     * mass delete customer
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function massDelete()
    {
        $idsString = Input::get($this->getGridId());
        $ids = explode(',', $idsString) ? explode(',', $idsString) : $idsString;
//        print_r(json_encode($ids));die();
        $data = $this->massDestroy($ids);
        if (isset($data['errors)'])) {
            return Redirect::route('users.list')->with('error', $data['errors'][0]['message'])->withInput();
        } else {
            $count = count($data);
            return Redirect::route('users.list')->with('success',
                Lang::get('messages.number_records_have_been_deleted', ['count' => $count]));
        }
    }

    /**
     * create customer form
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle(Lang::get('users.create_a_user'));
        $tabs = new UserTabs($this->getTabsId());
        $this->setTabs($tabs);
        return $this->loadTabs();
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
        $taikhoanvitrilamviecs = DB::table('taikhoan_vitrilamviec')->where('user_id','=',$id)->get();

        if(count($taikhoanvitrilamviecs)) {
            foreach($taikhoanvitrilamviecs as $key => $value) {
                $data['mission_id'][] = $value->vitrilamviec_id;
            }
        }

        App::instance($this->getTabsId(), $data);
        $this->setPageTitle(Lang::get('users.edit_user') . ' # ' . $data['first_name'] . ' ' . $data['last_name']);
        $tabs = new UserTabs($this->getTabsId());
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
        if (!empty($input['password'])) {
            $input['password'] = \Hash::make($input['password']);
        } else
            unset($input['password']);

        $input['email'] = mb_strtolower($input['email']);
        if(strpos($input['email'], '@') < 1) {
            $input['email'] = $input['email'] . '@vtv.com';
        }
        if (!$id) {
            $data = $this->store($input);
        } else {
            $data = $this->update($id, $input);
        }
        if(!isset($data['errors'])) {
            $id = $data['_id'];
            if(isset($input['mission_id'])) {
                DB::table('taikhoan_vitrilamviec')->where('user_id','=',$id)->delete();
                foreach ( $input['mission_id'] as $key =>$value ) {
                        $tmp['user_id'] = $id;
                        $tmp['vitrilamviec_id'] = $value;
                        $taikhoanvitrilamviec = new App\Models\TaiKhoanViTriLamViec($tmp);
                        $taikhoanvitrilamviec->save();
                }
            }
        }

        if (isset($data['errors']))
            return $id ?
                Redirect::route('users.edit', [$id])
                    ->with('error', $data['errors'][0]['message'])
                    ->withInput() :

                Redirect::route('users.create')
                    ->with('error', $data['errors'][0]['message'])
                    ->withInput();
        elseif (Input::get('tab')) {
            $id = $data['_id'];
            return Redirect::route('users.edit', [$id, 'tab' => Input::get('tab')])->with('success',
                Lang::get('messages.the_user_has_been_saved'));
        } else {
            return Redirect::route('users.list')
                ->with('success', Lang::get('messages.the_user_has_been_saved'));
        }
    }


    /**
     * delete customer
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        if ($id) {
            $data = $this->destroy($id);
            if (isset($data['errors']))
                return $id ?
                    Redirect::route('users.edit', [$id])
                        ->with('error', $data['errors'][0]['message'])
                        ->withInput() :

                    Redirect::route('users.list')
                        ->with('error', $data['errors'][0]['message'])
                        ->withInput();
            else {
                return Redirect::route('users.list')
                    ->with('success', Lang::get('messages.the_customer_has_been_deleted'));
            }
        } else {
            return Redirect::route('users.list')
                ->with('error', Lang::get('messages.does_not_exist'));
        }
    }
    public function changerLevel(){
        $input = $this->_processData(Input::all());
        $old_level = $input['old_level'];
        $new_level = $input['new_level'];
        $data = \Session::get('user_data');
        $use  = App\Models\User::find($data["_id"]);
        $use->level_id = $new_level;
        $use->save();
        $chudanh_id = $data["chucdanh_id"];
        $room_id = $data["room_id"];
        $works = App\Models\Work::where('level_id','=',$old_level)->where('chucdanh_id','=',$chudanh_id)->where('room_id','=',$room_id)->get();
        if(!count($works))
            return;
        $tmp = App\Models\Work::where('level_id','=',$new_level)->where('chucdanh_id','=',$chudanh_id)->where('room_id','=',$room_id)->get();
        if(count($tmp))
            return;
        foreach($works as $value){
            $work = new App\Models\Work();
            $work->name = $value->name;
            $work->chucdanh_id = $value->chucdanh_id;
            $work->room_id = $value->room_id;
            $work->level_id = $new_level;
            $work->heso = $value->heso;
            $work->macdinh = $value->macdinh;
            $work->save();
            unset($work);

        }

        return;


    }

}