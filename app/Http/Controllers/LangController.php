<?php namespace App\Http\Controllers;

use Input;
use App\Blocks\Lang\Grid;
use Redirect;
use Lang;
use App;
use App\Blocks\Lang\Tabs;
use Auth;


class LangController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->setGridId('languages');
        $this->setTabsId('languages');
        $this->setResource('App\Models\Lang');
        $this->setSingularKey('language');
        $this->setPluralKey('languages');
        $this->setModelClass('App\Models\Lang');
    }


    /**
     * @return \Illuminate\View\View
     */
    public function indexWithoutParam()
    {
        $grid = new Grid($this->getGridId(), $this->getResource(), $this->getPluralKey());
        $this->setGrid($grid);
        $this->setPageTitle(Lang::get('lang.manage_lang'));
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
        $this->setPageTitle(Lang::get('lang.manage_lang'));
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
        \Session::forget('languages');
        if (isset($data['errors)'])) {
            return Redirect::route('languages.list')->with('error', $data['errors'][0]['message'])->withInput();
        } else {
            $count = count($data);
            return Redirect::route('languages.list')->with('success',
                Lang::get('messages.number_records_have_been_deleted', ['count' => $count]));
        }
    }

    /**
     * create customer form
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle(Lang::get('lang.create_a_lang'));
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
        $data = $this->show($id, null);

        if (isset($data['errors'])) {
            return Redirect::route('languages.list')
                ->with('error', $data['errors'][0]['message'])
                ->withInput();
        }
        App::instance($this->getTabsId(), $data);
        $this->setPageTitle(Lang::get('languages.edit_menu') . ' # ' . $data['name']);
        $tabs = new Tabs($this->getTabsId());
        $this->setTabs($tabs);
        \Session::forget('languages');
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
        if (isset($input['tab']))
            unset($input['tab']);
        $input['user_id'] = Auth::id();
        if (isset($input['file']))
            $input['url'] = $this->uploadFile($input['file']);
        if (!$id) {
            $data = $this->store($input);
        } else {
            $data = $this->update($id, $input);
        }
        \Session::forget('languages');
        if (isset($data['errors']))
            return $id ?
                Redirect::route('languages.edit', [$id])
                    ->with('error', $data['errors'][0]['message'])
                    ->withInput() :

                Redirect::route('languages.create')
                    ->with('error', $data['errors'][0]['message'])
                    ->withInput();
        elseif (Input::get('tab')) {
            $id = $data['_id'];
            return Redirect::route('languages.edit', [$id, 'tab' => Input::get('tab')])->with('success',
                Lang::get('messages.the_lang_has_been_saved'));
        } else {
            return Redirect::route('languages.list')
                ->with('success', Lang::get('messages.the_lang_has_been_saved'));
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
            \Session::forget('languages');
            if (isset($data['errors']))
                return $id ?
                    Redirect::route('languages.edit', [$id])
                        ->with('error', $data['errors'][0]['message'])
                        ->withInput() :

                    Redirect::route('languages.list')
                        ->with('error', $data['errors'][0]['message'])
                        ->withInput();
            else {
                return Redirect::route('languages.list')
                    ->with('success', Lang::get('lang.the_language_has_been_deleted'));
            }
        } else {
            return Redirect::route('languages.list')
                ->with('error', Lang::get('messages.does_not_exist'));
        }
    }

    /**
     * @param $data
     * @return string
     */
    public function uploadFile($data)
    {
        $dir = public_path() . '/images/languages';
        $arr_name = $data->getClientOriginalName();
        $arr_name = explode(".", $arr_name);
        $hash = \Hash::make($arr_name[0]);
        $hash = preg_replace('/[^A-Za-z0-9\-]/', '', $hash); // Removes special chars.
        $data->move($dir, $hash . '.' . $arr_name[1]);

        return '/images/languages/' . $hash . '.' . $arr_name[1];
    }
}