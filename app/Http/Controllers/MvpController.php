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
use App\Blocks\Mvp\Tabs;
use App\Blocks\Mvp\Grid as GridReview;
use Auth;
use Session;
class MvpController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->setGridId('mvps');
        $this->setTabsId('mvps');
        $this->setResource('App\Models\Mvp');
        $this->setSingularKey('mvps');
        $this->setPluralKey('works');
        $this->setModelClass('App\Models\Mvp');
    }


    /**
     * @return \Illuminate\View\View
     */
    public function indexWithoutParam()
    {
        $reviewGrid = [];
        if (isset($reviews) && !empty($reviews)) {
            $reviewGrid = $this->reviews(null);
        }
        $product = [];
        View::share([
            'pageTitle' => 'Nhân Vật Tiêu Biểu',
            'product' => $product,
        ]);
        return view('mvp.edit')->with('reviewGrid', $reviewGrid);

    }


    /**
     * @param null $filter
     * @return \Illuminate\View\View
     */
    public function index($filter = null)
    {
        $reviewGrid = [];
        if (isset($reviews) && !empty($reviews)) {
            $reviewGrid = $this->reviews(null);
        }
        $product = [];
        View::share([
            'pageTitle' => 'Công Việc Chuyên Môn',
            'product' => $product,
        ]);
        return view('product.edit')->with('reviewGrid', $reviewGrid);
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
        $thang = 'DSNVTB '. str_replace("/", '-', $thang);
//        var_dump($thang);die();
        $grid = new GridReview('Export All', $this->getResource(), $thang, $param);
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

        $data = App\Models\Mvp::whereIn('_id',$ids)->get();

        auth()->check();
        $user_id = \Auth::id();

        if(count($data)) {
            $thang_id = $data[0]->thang_id;
            if(App\Helpers\Mvp::getStatusBanDuyetThang($thang_id)) {
                $thang_name  = App\Helpers\Month::getThangByID($thang_id);
                return Redirect::route('mvps.list')->with('error', 'Lãnh đạo ban đã duyệt DS NV Tiêu Biểu cho tháng '. $thang_name .
                    ', bạn không có quyền xóa')->withInput();
            }
            foreach($data as $key => $value) {
                if($value->nguoidexuat_id != $user_id) {
                    return Redirect::route('mvps.list')->with('error', 'Mời bạn chọn lại,
                     Bạn không có quyền xóa những người không phải do bạn đề xuất')->withInput();
                }
            }


        }

        $data = $this->massDestroy($ids);
        if (isset($data['errors)'])) {
            return Redirect::route('mvps.list')->with('error', $data['errors'][0]['message'])->withInput();
        } else {
            $count = count($data);
            return Redirect::route('mvps.list')->with('success','Xóa thành công '.$count. 'nhân viên trong danh sách');
        }

    }

    /**
     * create customer form
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle("Công Việc Chuyên Môn");
        $tabs = new Tabs($this->getTabsId());
        $this->setTabs($tabs);
        return $this->loadTabs();
    }
    public function reviews($productId = null)
    {
        $input = Input::all();
        if(isset($input['thang_id']) && $input['thang_id'] > 0) {
            $input['thang_id'] = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        } else {
            $input['thang_id'] = App\Helpers\Month::getCurrentMonth()->_id;
        }

        $param['filter']= $input;

        Session::put('param', $param);

        $gridReview = new GridReview('mvps', 'App\Models\Mvp', 'mvps', $param);
        $this->setGrid($gridReview);
        return $this->loadGridReview();
    }

    protected function loadGridReview()
    {
        return view('mvp.review', [
            'content' => view('grid.container', ['grid' => $this->getGrid()]),
            'pageTitle' => $this->getPageTitle()
        ]);
    }


    /**
     * edit customer form
     * @param $id
     * @return $this|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data = App\Models\Work::find($id);

        if (isset($data['errors'])) {
            return Redirect::route('works')
                ->with('error', $data['errors'][0]['message'])
                ->withInput();
        }
        App::instance($this->getTabsId(), $data);
        $this->setPageTitle(Lang::get('mvps.edit_CVCM') . ' # ' . $data['_id']);
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
        if (!$id) {
            $data = $this->store($input);
        }else {
            $data =  $this->update($id, $input);
        }
        if (isset($data['errors']))
            return $id ?
                Redirect::route('mvps.edit', [$id])
                    ->with('error', $data['errors'][0]['message'])
                    ->withInput() :

                Redirect::route('mvps.create')
                    ->with('error', $data['errors'][0]['message'])
                    ->withInput();
        elseif (Input::get('tab')) {
            $id = $data['_id'];
            return Redirect::route('mvps.edit', [$id, 'tab' => Input::get('tab')])->with('success',"Lưu thành công công việc");
        } else {
            return Redirect::route('mvps')
                ->with('success', "Lưu thành công công việc");
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
                    Redirect::route('mvps.edit', [$id])
                        ->with('error', $data['errors'][0]['message'])
                        ->withInput() :

                    Redirect::route('mvps')
                        ->with('error', $data['errors'][0]['message'])
                        ->withInput();
            else {
                return Redirect::route('mvps')
                    ->with('success', Lang::get('messages.the_role_has_been_deleted'));
            }
        } else {
            return Redirect::route('mvps')
                ->with('error', Lang::get('messages.does_not_exist'));
        }

    }
    public function addNew(){
        auth()->check();
        $input = $this->_processData(Input::all());
        $input['nguoidexuat_id'] = \Auth::id();
        if(isset($input['thang_id']) && $input['thang_id'] > 0) {
            $thang_id = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        } else {
            $thang_id = App\Helpers\Month::getCurrentMonth()->_id;
        }

        if(App\Helpers\Mvp::getStatusBanDuyetThang($thang_id)) {
            return 1;
        }

        $input['thang_id'] = $thang_id;
        $data = $this->store($input);
        return 2;
    }
    public function getList(){

    }
    public function banUpdateTieuBieu() {
        $idsString = Input::get($this->getGridId());
        $duyet = Input::get('massaction-update');
        $ids = explode(',', $idsString) ? explode(',', $idsString) : $idsString;

        foreach($ids as $key => $value) {
            $data = App\Models\Mvp::find($value);
            if(!isset($data['errors)'])) {
                $data->is_banduyet = $duyet;
                $data->save();
            }

        }

        $count = count($ids);
        return Redirect::route('mvps.list')->with('success',
            Lang::get('messages.number_records_have_been_update', ['count' => $count]));


    }
    public function applyTieuBieu() {
        if (!\App\Helpers\User::isVaiTroCapBan()) {
            return false;
        }
        $input = Input::all();
        $idsString = $input['ids'];
        $ids = explode(',', $idsString) ? explode(',', $idsString) : $idsString;
        foreach($ids as $key => $value) {
            $data = App\Models\Mvp::find($value);
            if(!isset($data['errors)'])) {
                $data->is_banduyet = 1;
                $data->save();
            }
        }

        return 1;
    }
    public function unApplyTieuBieu() {
        if (!\App\Helpers\User::isVaiTroCapBan()) {
            return false;
        }
        $input = Input::all();
        $idsString = $input['ids'];
        $ids = explode(',', $idsString) ? explode(',', $idsString) : $idsString;
        foreach($ids as $key => $value) {
            $data = App\Models\Mvp::find($value);
            if(!isset($data['errors)'])) {
                $data->is_banduyet = 0;
                $data->save();
            }
            var_dump($value);

        }

        return 1;
    }
}