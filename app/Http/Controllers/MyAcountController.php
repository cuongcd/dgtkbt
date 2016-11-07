<?php namespace App\Http\Controllers;

use Input;
use App\Blocks\User\Grid;
use Redirect;
use Lang;
use App;
use App\Blocks\MyAcount\Tabs as UserTabs;
use Auth;

class MyAcountController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->setGridId('my_acount');
        $this->setTabsId('my_acount');
        $this->setResource('App\Models\User');
        $this->setSingularKey('my-acount');
        $this->setPluralKey('my-acount');
        $this->setModelClass('App\Models\User');
    }


    /**
     * @return \Illuminate\View\View
     */
    public function indexWithoutParam()
    {
        if(!Auth::check())
            return;
        $data = App\Models\User::find(Auth::id());
        if (isset($data['errors'])) {
            return Redirect::route('users.list')
                ->with('error', $data['errors'][0]['message'])
                ->withInput();
        }

//        $roles = $data->roles;
//        $data = $data->toArray();
//        $i = 0;
//        foreach ($roles as $role) {
//            $data['permissions'][$i]['_id'] = $role->_id;
//            $data['permissions'][$i++]['name'] = $role->name;
//        }
        App::instance($this->getTabsId(), $data);
        $this->setPageTitle(Lang::get('Thông Tin Nhân Viên') . ' # ' . $data['first_name'] . ' ' . $data['last_name']);
        $tabs = new UserTabs($this->getTabsId());
        $this->setTabs($tabs);
        return $this->loadTabs();
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
        }
        $use = App\Models\User::find(Auth::id());
        if(isset($input['password'])){
            $use->password = $input['password'];
            $use->save();
            return Redirect::route('my_acount')
                ->with('success', 'Bạn Đã Update Thành Công');
        }
        return Redirect::route('my_acount');

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
}