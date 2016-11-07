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
use App\Blocks\Job\JobGrid as JobGrid;
use Auth;

class JobController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->setGridId('self-rates');
        $this->setTabsId('self-rates');
        $this->setResource('App\Models\User');
        $this->setSingularKey('self-rates');
        $this->setPluralKey('self-rates');
        $this->setModelClass('App\Models\User');
    }


    /**
     * @return \Illuminate\View\View
     */
    public function indexWithoutParam()
    {
        if (!auth()->check())
            return;
        $id = Auth::id();
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
        View::share([
            'pageTitle' => 'Danh Sách Công Việc',
            'product' => $data,
        ]);
        return view('job.edit');
    }


    /**
     * @param null $filter
     * @return \Illuminate\View\View
     */
    public function index($filter = null)
    {

    }


    /**
     * grid controller
     * @param $filter
     */
    public function grid($filter)
    {
        $params = $this->_parseFilter($filter);
        $gridReview = new JobGrid('staffJobMe', 'App\Models\User', 'staffJobMe', $params);
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
        $data = \Session::get('staffData');
        $param['filter'] = $input;
        if (isset($data)) {
            $param['filter']['user_id'] = $data->_id;
        }
        $gridReview = new JobGrid('staffJobMe', 'App\Models\User', 'staffJobMe', $param);
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
        $this->setGridId('staffJobMe');
        $this->setTabsId('staffJobMe');
        $data = \Session::get('staffData');
        $input = Input::all();
        if (isset($input['thang_id']) && $input['thang_id'] > 0) {

            $param['filter'] = $input;
            $param['filter']['thang_id'] = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        }
        else
            $param['filter']['thang_id'] = App\Helpers\Month::getCurrentMonth()->_id;
        if (isset($data)) {
            $param['filter']['user_id'] = $data->_id;
        }
        $gridJob = new JobGrid('staffJobMe', 'App\Models\StaffJob', 'staffJobMe', $param);
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
        $gridJob = new JobGrid('staffJobMe', 'App\Models\StaffJob', 'staffJobMe', $params);
        $this->setGrid($gridJob);
        return $this->loadGridjob();
    }
}