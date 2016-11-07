<?php namespace App\Http\Controllers;

use Input;
use App\Blocks\Notify\Grid;
use Redirect;
use Lang;
use App;
use App\Blocks\Notify\Tabs;

class NotifyController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->setGridId('roles');
        $this->setTabsId('roles');
        $this->setResource('App\Models\Notify');
        $this->setSingularKey('roles');
        $this->setPluralKey('roles');
        $this->setModelClass('App\Models\Notify');
    }


    /**
     * @return \Illuminate\View\View
     */
    public function indexWithoutParam()
    {
        $grid = new Grid($this->getGridId(), $this->getResource(), $this->getPluralKey());
        $this->setGrid($grid);
        $this->setPageTitle(Lang::get('Quản Lý Thông Báo'));
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
        $this->setPageTitle(Lang::get('Quản Lý Thông Báo'));
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
            return Redirect::route('roles.list')->with('error', $data['errors'][0]['message'])->withInput();
        } else {
            $count = count($data);
            return Redirect::route('roles.list')->with('success',
                Lang::get('messages.number_records_have_been_deleted', ['count' => $count]));
        }
    }

    /**
     * create customer form
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('Thêm Thông Báo');
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
        $data = App\Models\Notify::find($id);

        if (isset($data['errors'])) {
            return Redirect::route('notify.list')
                ->with('error', $data['errors'][0]['message'])
                ->withInput();
        }
        App::instance($this->getTabsId(), $data);
        $this->setPageTitle('Edit Thông Báo # ' . $data['name']);
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
                Redirect::route('notify.edit', [$id])
                    ->with('error', $data['errors'][0]['message'])
                    ->withInput() :

                Redirect::route('notify.create')
                    ->with('error', $data['errors'][0]['message'])
                    ->withInput();
        elseif (Input::get('tab')) {
            $id = $data['_id'];
            return Redirect::route('notify.edit', [$id, 'tab' => Input::get('tab')])->with('success',
                Lang::get('messages.the_role_has_been_saved'));
        } else {
            return Redirect::route('notify.list')
                ->with('success', Lang::get('messages.the_role_has_been_saved'));
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
                    Redirect::route('notify.edit', [$id])
                        ->with('error', $data['errors'][0]['message'])
                        ->withInput() :

                    Redirect::route('notify.list')
                        ->with('error', $data['errors'][0]['message'])
                        ->withInput();
            else {
                return Redirect::route('notify.list')
                    ->with('success', Lang::get('messages.the_role_has_been_deleted'));
            }
        } else {
            return Redirect::route('notify.list')
                ->with('error', Lang::get('messages.does_not_exist'));
        }
    }
}