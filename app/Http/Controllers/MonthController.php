<?php namespace App\Http\Controllers;

use DebugBar\DebugBar;
use Input;
use App\Blocks\Month\Grid;
use Redirect;
use Lang;
use App;
use App\Blocks\Month\Tabs;
use Session;

class MonthController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->setGridId('months');
        $this->setTabsId('months');
        $this->setResource('App\Models\Month');
        $this->setSingularKey('months');
        $this->setPluralKey('months');
        $this->setModelClass('App\Models\Month');
    }


    /**
     * @return \Illuminate\View\View
     */
    public function indexWithoutParam()
    {
        $grid = new Grid($this->getGridId(), $this->getResource(), $this->getPluralKey());
        $this->setGrid($grid);
        $this->setPageTitle('Quản Lý Tháng');
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
        $this->setPageTitle('Quản Lý Tháng');
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
        $grid = new Grid($this->getGridId(), $this->getResource(), $this->getPluralKey());
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
        $data = $this->massDestroy($ids);
        if (isset($data['errors)'])) {
            return Redirect::route('months.list')->with('error', $data['errors'][0]['message'])->withInput();
        } else {
            $count = count($data);
            return Redirect::route('months.list')->with('success',
                Lang::get('messages.number_records_have_been_deleted', ['count' => $count]));
        }
    }

    /**
     * create customer form
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle("Thêm Tháng");
        $tabs = new Tabs($this->getTabsId());
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
        $data = App\Models\Month::find($id);
        Session::put('month_id',$id);
        if (isset($data['errors'])) {
            return Redirect::route('months.list')
                ->with('error', $data['errors'][0]['message'])
                ->withInput();
        }
        App::instance($this->getTabsId(), $data);
        $this->setPageTitle(Lang::get('months.edit_user') . ' # ' . $data['name']);
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
//            App\Models\Role::find($data['_id'])->permission()->attach($category_id);$category_id
        }else {
            $data =  $this->update($id, $input);
//            App\Models\Role::find($data['_id'])->permission()->sync($category_id);
        }
        if (isset($data['errors']))
            return $id ?
                Redirect::route('months.edit', [$id])
                    ->with('error', $data['errors'][0]['message'])
                    ->withInput() :

                Redirect::route('months.create')
                    ->with('error', $data['errors'][0]['message'])
                    ->withInput();
        elseif (Input::get('tab')) {
            $id = $data['_id'];
            return Redirect::route('months.edit', [$id, 'tab' => Input::get('tab')])->with('success',
                'Lưu Thành Công');
        } else {
            return Redirect::route('months.list')
                ->with('success','Lưu Thành Công');
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
                    Redirect::route('months.edit', [$id])
                        ->with('error', $data['errors'][0]['message'])
                        ->withInput() :

                    Redirect::route('months.list')
                        ->with('error', $data['errors'][0]['message'])
                        ->withInput();
            else {
                return Redirect::route('months.list')
                    ->with('success', 'Xóa Thành Công');
            }
        } else {
            return Redirect::route('months.list')
                ->with('error','Xóa Thành Công');
        }
    }
    public function  setToCurrent(){
        App\Helpers\Month::setToCurrent(Session::get('month_id'));
        return;
    }
}