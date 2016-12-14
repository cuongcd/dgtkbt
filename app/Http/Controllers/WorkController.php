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
use App\Blocks\Work\Tabs;
use App\Blocks\Work\Grid as GridReview;
use Excel;

class WorkController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->setGridId('works');
        $this->setTabsId('works');
        $this->setResource('App\Models\Work');
        $this->setSingularKey('works');
        $this->setPluralKey('works');
        $this->setModelClass('App\Models\Work');
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
        return view('product.edit')->with('reviewGrid', $reviewGrid);

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
        $this->setPageTitle("Công Việc Chuyên Môn");
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
        $gridReview = new GridReview('works', 'App\Models\Work', 'works', $param);
        $this->setGrid($gridReview);
//            $this->setPageTitle(Lang::get('catalog.manage_products'));
        return $this->loadGridReview();
    }

    protected function loadGridReview()
    {
        return view('product.review', [
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
        $this->setPageTitle(Lang::get('works.edit_CVCM') . ' # ' . $data['_id']);
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
                Redirect::route('works.edit', [$id])
                    ->with('error', $data['errors'][0]['message'])
                    ->withInput() :

                Redirect::route('works.create')
                    ->with('error', $data['errors'][0]['message'])
                    ->withInput();
        elseif (Input::get('tab')) {
            $id = $data['_id'];
            return Redirect::route('works.edit', [$id, 'tab' => Input::get('tab')])->with('success',"Lưu thành công công việc");
        } else {
            return Redirect::route('works')
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
                    Redirect::route('works.edit', [$id])
                        ->with('error', $data['errors'][0]['message'])
                        ->withInput() :

                    Redirect::route('works')
                        ->with('error', $data['errors'][0]['message'])
                        ->withInput();
            else {
                return Redirect::route('works')
                    ->with('success', Lang::get('messages.the_role_has_been_deleted'));
            }
        } else {
            return Redirect::route('works')
                ->with('error', Lang::get('messages.does_not_exist'));
        }

    }
    public function addNew(){
        $input = $this->_processData(Input::all());
        $data = $this->store($input);
        return;
    }
    public function getList(){

    }

    public function import() {

        ini_set('max_execution_time', 300);
        $input = $this->_processData(Input::all());
        $file = $input['file'];

        if (!$file->isValid())
            return 'No data could be read in the file.';
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $extension_guessed = $file->guessExtension();

        if ($extension != $extension_guessed) {
            return 'No data could be read in the file.';
        }

        $filename_new = str_random(20) . '.' . $extension;

        $path = public_path() . '/assets/import';

        $file->move($path, $filename_new);

        $sheet = Excel::load($path . '/' . $filename_new, function ($reader) {
        })->get();

        if (is_null($sheet)) {
            File::delete($path . '/' . $filename_new);
            return 'Could not load any sheets in the file.';
        }

        $job_total = $sheet->count();
        if ($job_total < 1) {
            File::delete($path . '/' . $filename_new);
            return 'No data could be read in the file.';
        }
        foreach ($sheet as $data) {
                $input['name'] = isset($data->tencongviec) ? $data->tencongviec : "";
                $input['heso'] = isset($data->heso) ? $data->heso : 0;
                $input['macdinh'] = isset($data->macdinh) ? $data->macdinh : 0;
                $input['chucdanh_id'] = $input['position_id'];

                $temp = $this->store($input);

        }
        return 'Import thành công công việc chuyên môn';
    }
}