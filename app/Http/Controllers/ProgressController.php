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
use App\Blocks\Progress\Tabs;
use App\Blocks\Progress\Grid as GridReview;

class ProgressController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->setGridId('progress');
        $this->setTabsId('progress');
        $this->setResource('App\Models\Progress');
        $this->setSingularKey('progress');
        $this->setPluralKey('progress');
        $this->setModelClass('App\Models\Progress');
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
            'pageTitle' => 'Công Việc Chuyên Môn',
            'product' => $product,
        ]);
        return view('progress.edit')->with('reviewGrid', $reviewGrid);

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
        return view('progress.edit')->with('reviewGrid', $reviewGrid);
    }


    /**
     * grid controller
     * @param $filter
     */
    public function grid($filter)
    {   $params = $this->_parseFilter($filter);
        $gridReview = new GridReview('progress', 'App\Models\Progress', 'progress', $params);
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
        $this->setPageTitle(Lang::get('users.create_a_user'));
        $tabs = new Tabs($this->getTabsId());
        $this->setTabs($tabs);
        return $this->loadTabs();
    }
    public function reviews($productId = null)
    {
        $input = Input::all();
        if(isset($input['position_id'])) {
            $input['chucdanh_id'] = $input['position_id'];
            unset($input['position_id']);
        }
        $param['filter']= $input;
        $gridReview = new GridReview('progress', 'App\Models\Progress', 'progress', $param);
        $this->setGrid($gridReview);
//            $this->setPageTitle(Lang::get('catalog.manage_products'));
        return $this->loadGridReview();
    }

    protected function loadGridReview()
    {
        return view('progress.review', [
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
        $data = App\Models\Progress::find($id);

        if (isset($data['errors'])) {
            return Redirect::route('progress')
                ->with('error', $data['errors'][0]['message'])
                ->withInput();
        }
        App::instance($this->getTabsId(), $data);
        $this->setPageTitle(Lang::get('progress.edit_CVCM') . ' # ' . $data['_id']);
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
                Redirect::route('progress.edit', [$id])
                    ->with('error', $data['errors'][0]['message'])
                    ->withInput() :

                Redirect::route('progress.create')
                    ->with('error', $data['errors'][0]['message'])
                    ->withInput();
        elseif (Input::get('tab')) {
            $id = $data['_id'];
            return Redirect::route('progress.edit', [$id, 'tab' => Input::get('tab')])->with('success',
                Lang::get('messages.the_role_has_been_saved'));
        } else {
            return Redirect::route('progress')
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
                    Redirect::route('progress.edit', [$id])
                        ->with('error', $data['errors'][0]['message'])
                        ->withInput() :

                    Redirect::route('progress.list')
                        ->with('error', $data['errors'][0]['message'])
                        ->withInput();
            else {
                return Redirect::route('progress.list')
                    ->with('success','Đã xóa thành công !!!');
            }
        } else {
            return Redirect::route('progress.list')
                ->with('error', Lang::get('messages.does_not_exist'));
        }
    }
    public function getList(){

    }
    public function addNew(){
        $input = $this->_processData(Input::all());
        $data = $this->store($input);
        return;
    }
}