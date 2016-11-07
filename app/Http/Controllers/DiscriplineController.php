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
use App\Blocks\Discripline\Tabs;
use App\Blocks\Discripline\Grid as GridReview;

class DiscriplineController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->setGridId('discriplines');
        $this->setTabsId('discriplines');
        $this->setResource('App\Models\Discripline');
        $this->setSingularKey('discriplines');
        $this->setPluralKey('discriplines');
        $this->setModelClass('App\Models\Discripline');
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
            'pageTitle' => 'Kỷ Luật Lao Động',
            'product' => $product,
        ]);
        return view('discripline.edit')->with('reviewGrid', $reviewGrid);

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
            'pageTitle' => 'Kỷ Luật Lao Động',
            'product' => $product,
        ]);
        return view('discripline.edit')->with('reviewGrid', $reviewGrid);
    }


    /**
     * grid controller
     * @param $filter
     */
    public function grid($filter)
    {   $params = $this->_parseFilter($filter);
        $gridReview = new GridReview('discriplines', 'App\Models\Discripline', 'discriplines', $params);
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
        $this->setPageTitle("Kỷ Luật Lao Động");
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
        $gridReview = new GridReview('discriplines', 'App\Models\Discripline', 'discriplines', $param);
        $this->setGrid($gridReview);
//            $this->setPageTitle(Lang::get('catalog.manage_products'));
        return $this->loadGridReview();
    }

    protected function loadGridReview()
    {
        return view('discripline.review', [
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
        $data = App\Models\Discripline::find($id);

        if (isset($data['errors'])) {
            return Redirect::route('discriplines')
                ->with('error', $data['errors'][0]['message'])
                ->withInput();
        }
        App::instance($this->getTabsId(), $data);
        $this->setPageTitle('Kỷ Luật Lao ĐỘng'. ' # ' . $data['_id']);
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

//        App\Helpers\AutoTest::KyLuat($input['level_id'],$input['room_id'],$input['chucdanh_id']);
//        return Redirect::route('discriplines')
//            ->with('success', Lang::get('messages.the_role_has_been_saved'));
        if (!$id) {
            $data = $this->store($input);
        }else {
            $data =  $this->update($id, $input);
        }
        if (isset($data['errors']))
            return $id ?
                Redirect::route('discriplines.edit', [$id])
                    ->with('error', $data['errors'][0]['message'])
                    ->withInput() :

                Redirect::route('discriplines.create')
                    ->with('error', $data['errors'][0]['message'])
                    ->withInput();
        elseif (Input::get('tab')) {
            $id = $data['_id'];
            return Redirect::route('discriplines.edit', [$id, 'tab' => Input::get('tab')])->with('success',
                Lang::get('messages.the_role_has_been_saved'));
        } else {
            return Redirect::route('discriplines')
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
                    Redirect::route('discriplines.edit', [$id])
                        ->with('error', $data['errors'][0]['message'])
                        ->withInput() :

                    Redirect::route('discriplines')
                        ->with('error', $data['errors'][0]['message'])
                        ->withInput();
            else {
                return Redirect::route('discriplines')
                    ->with('success', Lang::get('messages.the_role_has_been_deleted'));
            }
        } else {
            return Redirect::route('discriplines')
                ->with('error', Lang::get('messages.does_not_exist'));
        }
    }
    public function getList(){

    }
    public function  addNew(){
        $input = $this->_processData(Input::all());
        $data = $this->store($input);
        return;
    }
}