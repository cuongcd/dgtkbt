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
use App\Blocks\Contribute\Tabs;
use App\Blocks\Contribute\Grid as GridReview;

class ContributeController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->setGridId('contributes');
        $this->setTabsId('contributes');
        $this->setResource('App\Models\Contribute');
        $this->setSingularKey('contributes');
        $this->setPluralKey('contributes');
        $this->setModelClass('App\Models\Contribute');
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
            'pageTitle' => 'Đóng Ghóp',
            'product' => $product,
        ]);
        return view('contribute.edit')->with('reviewGrid', $reviewGrid);

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
            'pageTitle' => 'Đóng Ghóp',
            'product' => $product,
        ]);
        return view('contribute.edit')->with('reviewGrid', $reviewGrid);
    }


    /**
     * grid controller
     * @param $filter
     */
    public function grid($filter)
    {   $params = $this->_parseFilter($filter);
        $gridReview = new GridReview('contributes', 'App\Models\Contribute', 'contributes', $params);
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
        $this->setPageTitle('Đóng Góp');
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
        $gridReview = new GridReview('contributes', 'App\Models\Contribute', 'contributes', $param);
        $this->setGrid($gridReview);
//            $this->setPageTitle(Lang::get('catalog.manage_products'));
        return $this->loadGridReview();
    }

    protected function loadGridReview()
    {
        return view('contribute.review', [
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
        $data = App\Models\Contribute::find($id);

        if (isset($data['errors'])) {
            return Redirect::route('progress')
                ->with('error', $data['errors'][0]['message'])
                ->withInput();
        }
        App::instance($this->getTabsId(), $data);
        $this->setPageTitle('Đóng Góp' . ' # ' . $data['_id']);
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
                Redirect::route('contributes.edit', [$id])
                    ->with('error', $data['errors'][0]['message'])
                    ->withInput() :

                Redirect::route('contributes.create')
                    ->with('error', $data['errors'][0]['message'])
                    ->withInput();
        elseif (Input::get('tab')) {
            $id = $data['_id'];
            return Redirect::route('contributes.edit', [$id, 'tab' => Input::get('tab')])->with('success',
                Lang::get('messages.the_role_has_been_saved'));
        } else {
            return Redirect::route('contributes')
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

    }
    public function getList(){

    }
    public function addNew(){
        $input = $this->_processData(Input::all());
        $this->store($input);
        return;
    }
}