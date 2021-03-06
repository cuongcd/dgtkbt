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
use App\Blocks\Quality\Tabs;
use App\Blocks\Quality\Grid as GridReview;
use Excel;

class QualityController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->setGridId('qualities');
        $this->setTabsId('qualities');
        $this->setResource('App\Models\Quality');
        $this->setSingularKey('qualities');
        $this->setPluralKey('qualities');
        $this->setModelClass('App\Models\Quality');
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
        return view('quality.edit')->with('reviewGrid', $reviewGrid);

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
            'pageTitle' => 'Chất Lượng Công Việc',
            'product' => $product,
        ]);
        return view('quality.edit')->with('reviewGrid', $reviewGrid);
    }


    /**
     * grid controller
     * @param $filter
     */
    public function grid($filter)
    {   $params = $this->_parseFilter($filter);
        $gridReview = new GridReview('qualities', 'App\Models\Quality', 'qualities', $params);
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
        if(isset($input['position_id'])) {
            $input['chucdanh_id'] = $input['position_id'];
            unset($input['position_id']);
        }
        $param['filter']= $input;
        $gridReview = new GridReview('qualities', 'App\Models\Quality', 'qualities', $param);
        $this->setGrid($gridReview);
//            $this->setPageTitle(Lang::get('catalog.manage_products'));
        return $this->loadGridReview();
    }

    protected function loadGridReview()
    {
        return view('quality.review', [
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
        $data = App\Models\Quality::find($id);

        if (isset($data['errors'])) {
            return Redirect::route('progress')
                ->with('error', $data['errors'][0]['message'])
                ->withInput();
        }
        App::instance($this->getTabsId(), $data);
        $this->setPageTitle(Lang::get('qualities.edit_CVCM') . ' # ' . $data['_id']);
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
                    Redirect::route('qualities.edit', [$id])
                        ->with('error', $data['errors'][0]['message'])
                        ->withInput() :

                    Redirect::route('qualities.list')
                        ->with('error', $data['errors'][0]['message'])
                        ->withInput();
            else {
                return Redirect::route('qualities.list')
                    ->with('success','Đã xóa thành công chất lượng công việc');
            }
        } else {
            return Redirect::route('qualities.list')
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
        try {
            foreach ($sheet as $data) {
//                for ($i = 0; $i < count($data); $i++) {
                    $input['name'] = isset($data->tenloi) ? $data->tenloi : "";
                    $input['diemtru'] = isset($data->diemtru) ? $data->diemtru : 0;
                    $input['chucdanh_id'] = $input['position_id'];

                    $temp = $this->store($input);
//                }
//                return 'Products were import success.';

            }
            return 'import thành công chất lượng công việc.';
        } catch (\Exception $e) {
            return 'Import lỗi, mời bạn thử lại sau';
        }
    }
}