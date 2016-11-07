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
use App\Blocks\Classification\Grid as GridReview;
use App\Blocks\Classification\GridExport ;

use Auth;

class ClassificationController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->setGridId('staffs');
        $this->setTabsId('staffs');
        $this->setResource('App\Models\User');
        $this->setSingularKey('staffs');
        $this->setPluralKey('staffs');
        $this->setModelClass('App\Models\User');
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
            'pageTitle' => 'Tổng Hợp Kết Quả',
            'product' => $product,
        ]);
        return view('classification.edit')->with('reviewGrid', $reviewGrid);

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
            'pageTitle' => 'Tổng Hợp Kết Quả',
            'product' => $product,
        ]);
        return view('classification.edit')->with('reviewGrid', $reviewGrid);
    }


    /**
     * grid controller
     * @param $filter
     */
    public function grid($filter)
    {
        $params = $this->_parseFilter($filter);
        $gridReview = new GridReview('classification', 'App\Models\User', 'classification', $params);
        $this->setGrid($gridReview);
        return $this->loadGridReview();

    }


    /**
     * export excel
     * @param $type
     */
    public function export($type = 'xlsx')
    {
        $input = Input::all();
        if (isset($input['position_id'])) {
            $input['chucdanh_id'] = $input['position_id'];
            unset($input['position_id']);
        }
        $param['filter'] = $input;
        $thang_name = "";
        if(isset($input['thang_id']) && $input['thang_id'] > 0){
            $thang_id = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
            $param['filter']['thang_id'] = $thang_id ;
            $thang_name = App\Helpers\Month::getThangByID($thang_id);
            $thang_name = str_replace("/","-",$thang_name);

        }
        $gridReview = new GridReview('Kết Quả ĐGLD '.$thang_name, 'App\Models\User', 'Kết Quả ĐGLD '.$thang_name, $param);
        $this->exportFile($type, $gridReview);
    }

    public function exportAll($type = 'xlsx')
    {
        $input = Input::all();
        if (isset($input['position_id'])) {
            $input['chucdanh_id'] = $input['position_id'];
            unset($input['position_id']);
        }
        $param['filter'] = $input;
        $thang_name = "";
        if(isset($input['thang_id']) && $input['thang_id'] > 0){
            $thang_id = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
            $param['filter']['thang_id'] = $thang_id ;
            $thang_name = App\Helpers\Month::getThangByID($thang_id);
            $thang_name = str_replace("/","-",$thang_name);

        }
        $gridReview = new GridExport('DGLD VTVNEWS '.$thang_name, 'App\Models\User', 'DGLD VTVNEWS '.$thang_name, $param);
        $this->exportFile($type, $gridReview);
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
        if (isset($input['position_id'])) {
            $input['chucdanh_id'] = $input['position_id'];
            unset($input['position_id']);
        }
        $param['filter'] = $input;
        if(isset($input['thang_id']) && $input['thang_id'] > 0){
            $param['filter']['thang_id'] = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        }
        $gridReview = new GridReview('classification', 'App\Models\User', 'classification', $param);
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

    public function updateXepLoai()
    {
        $input = Input::all();
        if (!isset($input['email']) || !isset($input['thang_id']) || !isset($input['xeploai']))
            return;
        $use = App\Models\User::where('first_name', '=', $input['email'])->first();
        if (isset($use->_id)) {
            $thang_id = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
            $danhgia = App\Models\DanhGia::where('user_id', '=', $use->_id)->where('thang_id', '=', $thang_id)->first();
            if (isset($danhgia->_id)) {

                $xeploai = ['A*', 'A1', 'A2', 'B1', 'B2', 'B3', 'C'];
                if (in_array($input['xeploai'],$xeploai)) {
                    $danhgia->banxeploai = $input['xeploai'];
                    $danhgia = $danhgia->save();
                }
            }

        }
        return;

    }


}