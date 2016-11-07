<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 5/5/16
 * Time: 9:20 PM
 */

namespace App\Http\Controllers;

use Input;
use Psy\Util\Json;
use Redirect;
use Lang;
use View;
use App;
use App\Blocks\Quality\Tabs;
use App\Blocks\Staff\Grid as GridReview;
use App\Blocks\Staff\JobGrid as JobGrid;
use Auth;

class StaffController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->setGridId('staffs');
        $this->setTabsId('staffs');
        $this->setResource('App\Models\User');
        $this->setSingularKey('staffs');
        $this->setPluralKey('staffs');
        $this->setModelClass('App\Models\User');
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
            'pageTitle' => 'Danh Sách Nhân Viên',
            'product' => $product,
        ]);
        return view('staff.edit')->with('reviewGrid', $reviewGrid);

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
            'pageTitle' => 'Danh Sách Nhân Viên',
            'product' => $product,
        ]);
        return view('staff.edit')->with('reviewGrid', $reviewGrid);
    }


    /**
     * grid controller
     * @param $filter
     */
    public function grid($filter)
    {
        $params = $this->_parseFilter($filter);
        $gridReview = new GridReview('staffs', 'App\Models\User', 'staffs', $params);
        $this->setGrid($gridReview);
        return $this->loadGridReview();

    }


    /**
     * export excel
     * @param $type
     */
    public function export($type)
    {

    }


    /**
     * mass delete customer
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function massDelete()
    {
        $idsString = Input::get($this->getGridId());
        $ids = explode(',', $idsString) ? explode(',', $idsString) : $idsString;
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
        $this->setPageTitle(Lang::get('qualities.create_a_user'));
        $tabs = new Tabs($this->getTabsId());
        $this->setTabs($tabs);
        return $this->loadTabs();
    }

    public function reviews($productId = null)
    {
        $input = Input::all();
        if (isset($input['position_id'])) {
            $input['chucdanh_id'] = $input['position_id'];
            unset($input['position_id']);
        }
        $param['filter'] = $input;
        if(isset($input['thang_id']) && $input['thang_id'] > 0){
            $param['filter']['thang_id'] = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        }

        $gridReview = new GridReview('staffsCV', 'App\Models\User', 'staffsCV', $param);
        $this->setGrid($gridReview);
        return $this->loadGridReview();
    }

    protected function loadGridReview()
    {
        return view('quality.review', [
            'content' => view('grid.container', ['grid' => $this->getGrid()]),
            'pageTitle' => $this->getPageTitle()
        ]);
    }


    public function job($productId = null)
    {
        $this->setGridId('staffJobMonth');
        $this->setTabsId('staffJobMonth');
        $data = \Session::get('staffData');
        $input = Input::all();
        if (isset($input['thang_id']) && $input['thang_id'] > 0) {
            $thang_id = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
            $param['filter'] = $input;
            $param['filter']['thang_id'] = $thang_id;
        }
        else
            $param['filter']['thang_id'] = App\Helpers\Month::getCurrentMonth()->_id;
        if (isset($data)) {
            $param['filter']['user_id'] = $data->_id;
        }
        $gridJob = new JobGrid('staffJobMonth', 'App\Models\StaffJob', 'staffJobMonth', $param);
        $this->setGrid($gridJob);
        return $this->loadGridjob();
    }

    protected function loadGridjob()
    {
        return view('staffJob.review', [
            'content' => view('grid.container', ['grid' => $this->getGrid()]),
            'pageTitle' => $this->getPageTitle()
        ]);
    }

    public function gridJob($filter)
    {
        $params = $this->_parseFilter($filter);
        $gridJob = new JobGrid('staffJobMonth', 'App\Models\StaffJob', 'staffJobMonth', $params);
        $this->setGrid($gridJob);
        return $this->loadGridjob();
    }


    /**
     * edit customer form
     * @param $id
     * @return $this|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data = App\Models\User::find($id);

        if (isset($data['errors'])) {
            return Redirect::route('progress')
                ->with('error', $data['errors'][0]['message'])
                ->withInput();
        }
        $reviewGrid = [];
        if (isset($reviews) && !empty($reviews)) {
            $reviewGrid = $this->job(null);
        }
        \Session::put('staffData', $data);
//        $data1 = \App\Helpers\Job::getAllJob();
        View::share([
            'pageTitle' => 'Danh Sách Công Việc',
            'product' => $data,
        ]);
        return view('staffJob.edit')->with('reviewGrid', $reviewGrid);

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
        } else {
            $data = $this->update($id, $input);
        }
        if (isset($data['errors']))
            return $id ?
                Redirect::route('qualities.edit', [$id])
                    ->with('error', $data['errors'][0]['message'])
                    ->withInput() :

                Redirect::route('qualities.create')
                    ->with('error', $data['errors'][0]['message'])
                    ->withInput();
        elseif (Input::get('tab')) {
            $id = $data['_id'];
            return Redirect::route('qualities.edit', [$id, 'tab' => Input::get('tab')])->with('success',
                Lang::get('messages.the_role_has_been_saved'));
        } else {
            return Redirect::route('qualities')
                ->with('success', Lang::get('messages.the_role_has_been_saved'));
        }
    }

    public function updateJob()
    {
        $input = $this->_processData(Input::all());
        if (!isset($input['congviec_id']) || !isset($input['khoiluong']))
            return;
        $staffJob = App\Models\StaffJob::find($input['congviec_id']);
        $staffJob->khoiluong = $input['khoiluong'];
        $staffJob->save();
        return;


    }

    public function addNewJob()
    {
        if (!auth()->check())
            return;
        $id = Auth::id();

        $user = App\Models\User::find($id);
        $input = $this->_processData(Input::all());
        $data = \Session::get('staffData');
        if (!isset($data))
            return;
        if (!isset($input['congviec_id']) || !isset($input['khoiluong']) || !isset($input['thang_id']))
            return;
        $work = App\Models\Work::find($input["congviec_id"]);
        if (isset($work['errors'])) {
            return;
        }
        $thang_id = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        $tmp = App\Models\StaffJob::where('congviec_id','=',$input['congviec_id'])->where('user_id','=',$data['_id'])
            ->where('thang_id','=',$thang_id)->first();
        if($tmp){
            $tmp->khoiluong =  $input['khoiluong'];
            $tmp->save();
            return;
        }
        $staffJob = new App\Models\StaffJob();
        $staffJob->congviec_id = $work->_id;
        $staffJob->name = $work->name;
        $staffJob->heso = $work->heso;
        $staffJob->macdinh = $work->macdinh;
        $staffJob->khoiluong = $input['khoiluong'];
        $staffJob->thang_id = $thang_id;
        $staffJob->user_id = $data->_id;
        $staffJob->nguoigiao = $user->first_name;
        $staffJob->save();
        return;
    }
    public function unexpected(){
        if (!auth()->check())
            return;
        $id = Auth::id();

        $user = App\Models\User::find($id);
        $input = $this->_processData(Input::all());
        $data = \Session::get('staffData');
        if (!isset($data))
            return;
        if (!isset($input['jobname']) || !isset($input['khoiluong']) || !isset($input['thang_id']) || !isset($input['heso']))
            return;
        $thang_id = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        $staffJob = new App\Models\StaffJob();
        $staffJob->congviec_id = 0;
        $staffJob->name = $input['jobname'];
        $staffJob->heso = $input['heso'];
        $staffJob->macdinh = 0;
        $staffJob->khoiluong = $input['khoiluong'];
        $staffJob->thang_id = $thang_id;
        $staffJob->user_id = $data->_id;
        $staffJob->nguoigiao = $user->first_name;
        $staffJob->save();
        return;
    }

    public function applyDictionary(){
        if (!auth()->check())
            return;
        $id = Auth::id();

        $user = App\Models\User::find($id);
        $input = $this->_processData(Input::all());
        $data = \Session::get('staffData');
//        print_r(json_encode($data)); die();
        if (!isset($data))
            return;
        if (!isset($input['thang_id']))
            return;
        $thang_id = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        $work = App\Models\Work::where('level_id','=',$data->level_id)
            ->where('room_id','=',$data->room_id)
            ->where('chucdanh_id','=',$data->chucdanh_id)->get();
//        print_r(json_encode($work)); die();
        if (isset($work['errors'])) {
            return;
        }
        foreach($work as $value){
            unset($tmp);
            $tmp = App\Models\StaffJob::where('congviec_id','=',$value['_id'])->where('user_id','=',$data['_id'])->where('thang_id','=',$input['thang_id'])->first();
            if($tmp){
                $tmp->khoiluong = $value['macdinh'];
                $tmp->save();
            }else {
                $staffJob = new App\Models\StaffJob();
                $staffJob->congviec_id = $value['_id'];
                $staffJob->name = $value['name'];
                $staffJob->heso =  $value['heso'];
                $staffJob->macdinh =  $value['macdinh'];
                $staffJob->khoiluong = $value['macdinh'];
                $staffJob->thang_id = $thang_id;
                $staffJob->user_id = $data->_id;
                $staffJob->nguoigiao = $user->first_name;
                $staffJob->save();
                unset($staffJob);
            }
        }
    }

    public function applyMonth(){
        if (!auth()->check())
            return;
        $id = Auth::id();

        $user = App\Models\User::find($id);
        $input = $this->_processData(Input::all());
        $data = \Session::get('staffData');
        if (!isset($data))
            return;
        if (!isset($input['thang_id']) ||!isset($input['month_apply']))
            return;

        $thang_id = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        $month_apply_id = App\Helpers\Month::getMonthIdByDate($input['month_apply']);

        $word = App\Models\StaffJob::where('user_id','=', $data->_id)
            ->where('thang_id','=',$month_apply_id)->get();
        if (isset($work['errors'])) {
            return;
        }
        foreach($word as $value){
            $staffJob = new App\Models\StaffJob();
            $staffJob->congviec_id = $value['congviec_id'];
            $staffJob->name = $value['name'];
            $staffJob->heso =  $value['heso'];
            $staffJob->macdinh =  $value['macdinh'];
            $staffJob->khoiluong = $value['macdinh'];
            $staffJob->thang_id = $thang_id;
            $staffJob->user_id = $data->_id;
            $staffJob->nguoigiao = $user->first_name;
            $staffJob->save();
            unset($staffJob);
        }
    }
    public function  deleteJob(){
        if (!auth()->check())
            return;
        $input = $this->_processData(Input::all());
        if (!isset($input['congviec_id']))
            return;
        $staffJob = App\Models\StaffJob::find($input['congviec_id']);
        $staffJob->delete();
        return;
    }

    public function getBanDanhGia(){
        $input = $this->_processData(Input::all());
        $thang_id = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        if(App\Helpers\DanhGia::getIsBanDanhGia($thang_id))
        {
            echo (1);
            die();
        }else
        {
            echo (0);
            die();
        }
    }
    public function updateJobName(){
        $input = $this->_processData(Input::all());
        if (!isset($input['_id']) || !isset($input['_id']))
            return;
        $staffJob = App\Models\StaffJob::find($input['_id']);
        $staffJob->khoiluong = $input['khoiluong'];
        $staffJob->heso = $input['heso'];
        $staffJob->name = $input['name'];
        $staffJob->save();
        return;
    }
}