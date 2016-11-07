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
use App\Blocks\Rate\Grid as GridReview;
use App\Blocks\Rate\JobGrid as JobGrid;
use App\Blocks\Rate\KyLuatGrid as KyLuatGrid;
use App\Blocks\Rate\ChatLuongGrid;
use App\Blocks\Rate\TienDoGrid;
use App\Blocks\Rate\PhamChatGrid;
use App\Blocks\Rate\DongGopGrid;
use Auth;

class RateController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->setGridId('rates');
        $this->setTabsId('rates');
        $this->setResource('App\Models\User');
        $this->setSingularKey('rates');
        $this->setPluralKey('rates');
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
            'pageTitle' => 'Danh Sách Nhân Viên',
            'product' => $product,
        ]);
        return view('rate.edit')->with('reviewGrid', $reviewGrid);

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
            'pageTitle' => 'Danh Sách Nhân Viên',
            'product' => $product,
        ]);
        return view('staff.edit')->with('reviewGrid', $reviewGrid);
    }


    /**
     * grid controller
     * @param $filter
     */
    public function grid($filter)
    {
        $params = $this->_parseFilter($filter);
        $gridReview = new GridReview('staffs', 'App\Models\User', 'staffs', $params);
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
        if (isset($input['position_id'])) {
            $input['chucdanh_id'] = $input['position_id'];
            unset($input['position_id']);
        }
        $param['filter'] = $input;
        if(isset($input['thang_id']) && $input['thang_id'] > 0) {
            $thang_id = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        } else {
            $thang_id = App\Helpers\Month::getCurrentMonth()->_id;
        }
        $param['filter']['thang_id'] = $thang_id;
        App\Helpers\DanhGia::getDanhGiaByPhong($input['room_id'], $thang_id);
        $gridReview = new GridReview('staffsRate', 'App\Models\User', 'staffsRate', $param);
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


    public function job($productId = null)
    {
        $this->setGridId('staffJobRate');
        $this->setTabsId('staffJobRate');
        $data = \Session::get('staffData');
        $input = Input::all();
        if (isset($input['thang_id']) && $input['thang_id'] > 0){
            $param['filter'] = $input;
            $param['filter']['thang_id'] = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        } else
            $param['filter']['thang_id'] = App\Helpers\Month::getCurrentMonth()->_id;
        if (isset($data)) {
            $param['filter']['user_id'] = $data->_id;
        }

        $gridJob = new JobGrid('staffJobRate', 'App\Models\StaffJob', 'staffJobRate', $param);
        $this->setGrid($gridJob);
        return $this->loadGridjob();
    }

    protected function loadGridjob()
    {
        return view('staffJob.review', [
            'content' => view('grid.container', ['grid' => $this->getGrid()]),
            'pageTitle' => $this->getPageTitle()
        ]);
    }

    public function gridJob($filter)
    {
        $params = $this->_parseFilter($filter);
        $gridJob = new JobGrid('staffJob_rate', 'App\Models\StaffJob', 'staffJob_rate', $params);
        $this->setGrid($gridJob);
        return $this->loadGridjob();
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
            return Redirect::route('progress')
                ->with('error', $data['errors'][0]['message'])
                ->withInput();
        }
        $reviewGrid = [];
        if (isset($reviews) && !empty($reviews)) {
            $reviewGrid = $this->job(null);
        }
        \Session::put('staffData', $data);
        View::share([
            'pageTitle' => 'Danh Sách Công Việc',
            'product' => $data,
        ]);
        return view('rateStaff.edit');

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
        } else {
            $data = $this->update($id, $input);
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

    public function updateJob()
    {
        $input = $this->_processData(Input::all());
        if (!isset($input['_id']) || !isset($input['khoiluong']))
            return;
        $staffJob = App\Models\StaffJob::find($input['_id']);
        if (App\Helpers\VaiTro::getEditPhong())
            $staffJob->cv_phongdanhgia = $input['khoiluong'];
        $staffJob->cv_bandanhgia = $input['khoiluong'];
        if (isset($input['ghichu']))
            $staffJob->ghichu = $input['ghichu'];
        $staffJob->save();
        return;


    }

    /*
     * Tiến Độ Công Việc
     */
    public function tienDo($productId = null)
    {
        $this->setGridId('TienDo');
        $this->setTabsId('TienDo');
        $data = \Session::get('staffData');
        $input = Input::all();
        if (isset($input['thang_id']) && $input['thang_id'] > 0) {
            $param['filter'] = $input;
            $param['filter']['thang_id'] = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        } else
            $param['filter']['thang_id'] = App\Helpers\Month::getCurrentMonth()->_id;
        if (isset($data)) {
            $param['filter']['user_id'] = $data->_id;
        }
        $gridJob = new TienDoGrid('TienDo', 'App\Models\TienDoTaiKhoanThang', 'TienDo', $param);
        $this->setGrid($gridJob);
        return $this->loadGridTienDo();
    }

    protected function loadGridTienDo()
    {
        return view('staffJob.review', [
            'content' => view('grid.container', ['grid' => $this->getGrid()]),
            'pageTitle' => $this->getPageTitle()
        ]);
    }

    public function gridTiengDo($filter)
    {
        $params = $this->_parseFilter($filter);
        $gridJob = new TienDoGrid('TienDo', 'App\Models\TienDoTaiKhoanThang', 'TienDo', $params);
        $this->setGrid($gridJob);
        return $this->loadGridTienDo();
    }

    public function newTienDo()
    {
        if (!auth()->check())
            return;
        $id = Auth::id();
        $user = App\Models\User::find($id);
        $input = $this->_processData(Input::all());
        $data = \Session::get('staffData');
        if (!isset($data))
            return;
        if (!isset($input['_id']) || !isset($input['ghichu']) || !isset($input['diemtru']) || !isset($input['thang_id']))
            return;

        $tmp = App\Models\Progress::where('_id', '=', $input['_id'])->first();
        if (!$tmp) {
            return;
        }
//        print_r(json_encode($tmp)); die();

        $tiendo = new App\Models\TiendoTaiKhoanThang();
        $tiendo->name = $tmp->name;
        $tiendo->tiendo_id = $tmp->_id;
        $tiendo->diemtru = $tmp->diemtru;
        $tiendo->user_id = $data->_id;
        $tiendo->thang_id = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        if (App\Helpers\VaiTro::getEditPhong())
            $tiendo->td_phongtru = $input['diemtru'];
        $tiendo->td_bantru = $input['diemtru'];
        $tiendo->ghichu = $input['ghichu'];
        $tiendo->save();
        return;
    }

    public function updateTienDo()
    {
        if (!auth()->check())
            return;
        $input = $this->_processData(Input::all());
        $data = \Session::get('staffData');
        if (!isset($data))
            return;
        if (!isset($input['_id']) || !isset($input['ghichu']) || !isset($input['diemtru']))
            return;
        $tiendo = App\Models\TiendoTaiKhoanThang::find($input['_id']);
        if (!$tiendo)
            return;
        if (App\Helpers\VaiTro::getEditPhong())
            $tiendo->td_phongtru = $input['diemtru'];
        $tiendo->td_bantru = $input['diemtru'];
        $tiendo->ghichu = $input['ghichu'];
        $tiendo->save();
        return;
    }

    public function deleteTienDo()
    {
        if (!auth()->check())
            return;
        $input = $this->_processData(Input::all());
        $data = \Session::get('staffData');
        if (!isset($data))
            return;
        if (!isset($input['_id']))
            return;
        $tiendo = App\Models\TiendoTaiKhoanThang::find($input['_id']);
        if (!$tiendo)
            return;
        $tiendo->delete();
        return;
    }

    /*
     * Chat Luong Cong Viec
     */

    public function chatLuong($productId = null)
    {
        $this->setGridId('chatluong');
        $this->setTabsId('chatluong');
        $data = \Session::get('staffData');
        $input = Input::all();
        if (isset($input['thang_id']) && $input['thang_id'] > 0) {
            $param['filter'] = $input;
            $param['filter']['thang_id'] = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        } else
            $param['filter']['thang_id'] = App\Helpers\Month::getCurrentMonth()->_id;
        if (isset($data)) {
            $param['filter']['user_id'] = $data->_id;
        }
        $gridJob = new ChatLuongGrid('chatluong', 'App\Models\ChatLuongTaiKhoanThang', 'chatluong', $param);
        $this->setGrid($gridJob);
        return $this->loadGridChatLuong();
    }

    protected function loadGridChatLuong()
    {
        return view('staffJob.review', [
            'content' => view('grid.container', ['grid' => $this->getGrid()]),
            'pageTitle' => $this->getPageTitle()
        ]);
    }

    public function gridChatLuong($filter)
    {
        $params = $this->_parseFilter($filter);
        $gridJob = new ChatLuongGrid('chatluong', 'App\Models\ChatLuongTaiKhoanThang', 'chatluong', $params);
        $this->setGrid($gridJob);
        return $this->loadGridChatLuong();
    }

    public function newChatLuong()
    {
        if (!auth()->check())
            return;
        $id = Auth::id();
        $user = App\Models\User::find($id);
        $input = $this->_processData(Input::all());
        $data = \Session::get('staffData');
        if (!isset($data))
            return;
        if (!isset($input['_id']) || !isset($input['ghichu']) || !isset($input['diemtru']) || !isset($input['thang_id']))
            return;

        $tmp = App\Models\Quality::where('_id', '=', $input['_id'])->first();
        if (!$tmp) {
            return;
        }
//        print_r(json_encode($tmp)); die();

        $tiendo = new App\Models\ChatLuongTaiKhoanThang();
        $tiendo->name = $tmp->name;
        $tiendo->chatluong_id = $tmp->_id;
        $tiendo->diemtru = $tmp->diemtru;
        $tiendo->user_id = $data->_id;
        $tiendo->thang_id = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        if (App\Helpers\VaiTro::getEditPhong())
            $tiendo->cl_phongtru = $input['diemtru'];
        $tiendo->cl_bantru = $input['diemtru'];
        $tiendo->ghichu = $input['ghichu'];
        $tiendo->save();
        return;
    }

    public function updateChatLuong()
    {
        if (!auth()->check())
            return;
        $input = $this->_processData(Input::all());
        $data = \Session::get('staffData');
        if (!isset($data))
            return;
        if (!isset($input['_id']) || !isset($input['ghichu']) || !isset($input['diemtru']))
            return;
        $chatluong = App\Models\ChatLuongTaiKhoanThang::find($input['_id']);
        if (!$chatluong)
            return;
        if (App\Helpers\VaiTro::getEditPhong())
            $chatluong->cl_phongtru = $input['diemtru'];
        $chatluong->cl_bantru = $input['diemtru'];
        $chatluong->ghichu = $input['ghichu'];
        $chatluong->save();
        return;
    }

    public function deleteChatLuong()
    {
        if (!auth()->check())
            return;
        $input = $this->_processData(Input::all());
        $data = \Session::get('staffData');
        if (!isset($data))
            return;
        if (!isset($input['_id']))
            return;
        $chatLuong = App\Models\ChatLuongTaiKhoanThang::find($input['_id']);
        if (!$chatLuong)
            return;
        $chatLuong->delete();
        return;
    }

    /*
     * Kỷ Luật Lao Động
     */

    public function kyLuat($productId = null)
    {
        $this->setGridId('kyluat');
        $this->setTabsId('kyluat');
        $data = \Session::get('staffData');
        $input = Input::all();
        if (isset($input['thang_id']) && $input['thang_id'] > 0) {
            $param['filter'] = $input;
            $param['filter']['thang_id'] = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        } else
            $param['filter']['thang_id'] = App\Helpers\Month::getCurrentMonth()->_id;
        if (isset($data)) {
            $param['filter']['user_id'] = $data->_id;
        }
        $gridJob = new KyLuatGrid('kyluat', 'App\Models\KyLuatTaiKhoanThang', 'kyluat', $param);
        $this->setGrid($gridJob);
        return $this->loadGridKyLuat();
    }

    protected function loadGridKyLuat()
    {
        return view('staffJob.review', [
            'content' => view('grid.container', ['grid' => $this->getGrid()]),
            'pageTitle' => $this->getPageTitle()
        ]);
    }

    public function gridKyLuat($filter)
    {
        $params = $this->_parseFilter($filter);
        $gridJob = new KyLuatGrid('kyluat', 'App\Models\KyLuatTaiKhoanThang', 'kyluat', $params);
        $this->setGrid($gridJob);
        return $this->loadGridKyLuat();
    }

    public function newKyLuat()
    {
        if (!auth()->check())
            return;
        $id = Auth::id();
        $user = App\Models\User::find($id);
        $input = $this->_processData(Input::all());
        $data = \Session::get('staffData');
        if (!isset($data))
            return;
        if (!isset($input['_id']) || !isset($input['ghichu']) || !isset($input['diemtru']) || !isset($input['thang_id']))
            return;

        $tmp = App\Models\Discripline::where('_id', '=', $input['_id'])->first();
        if (!$tmp) {
            return;
        }
//        print_r(json_encode($tmp)); die();

        $kyluat = new App\Models\KyLuatTaiKhoanThang();
        $kyluat->name = $tmp->name;
        $kyluat->kyluat_id = $tmp->_id;
        $kyluat->diemtru = $tmp->diemtru;
        $kyluat->user_id = $data->_id;
        $kyluat->thang_id = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        if (App\Helpers\VaiTro::getEditPhong())
            $kyluat->kl_phongtru = $input['diemtru'];
        $kyluat->kl_bantru = $input['diemtru'];
        $kyluat->ghichu = $input['ghichu'];
        $kyluat->save();
        return;
    }

    public function updateKyLuat()
    {
        if (!auth()->check())
            return;
        $input = $this->_processData(Input::all());
        $data = \Session::get('staffData');
        if (!isset($data))
            return;
        if (!isset($input['_id']) || !isset($input['ghichu']) || !isset($input['diemtru']))
            return;
        $kyluat = App\Models\KyLuatTaiKhoanThang::find($input['_id']);
        if (!$kyluat)
            return;
        if (App\Helpers\VaiTro::getEditPhong())
            $kyluat->kl_phongtru = $input['diemtru'];
        $kyluat->kl_bantru = $input['diemtru'];
        $kyluat->ghichu = $input['ghichu'];
        $kyluat->save();
        return;
    }

    public function deleteKyLuat()
    {
        if (!auth()->check())
            return;
        $input = $this->_processData(Input::all());
        $data = \Session::get('staffData');
        if (!isset($data))
            return;
        if (!isset($input['_id']))
            return;
        $kyluat = App\Models\KyLuatTaiKhoanThang::find($input['_id']);
        if (!$kyluat)
            return;
        $kyluat->delete();
        return;
    }

    /*
     * Phẩm Chất Cá Nhân
     */

    public function phamChat($productId = null)
    {
        $this->setGridId('staffJob');
        $this->setTabsId('staffJob');
        $data = \Session::get('staffData');
        $input = Input::all();

        if (isset($input['thang_id']) && $input['thang_id'] > 0) {
            $param['filter'] = $input;
            $param['filter']['thang_id'] = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        }
        else
            $param['filter']['thang_id'] = App\Helpers\Month::getCurrentMonth()->_id;
        if (isset($data)) {
            $param['filter']['user_id'] = $data->_id;
        }
        $gridJob = new PhamChatGrid('phamchat', 'App\Models\PhamChatTaiKhoanThang', 'phamchat', $param);
        $this->setGrid($gridJob);
        return $this->loadGridPhamChat();
    }

    protected function loadGridPhamChat()
    {
        return view('staffJob.review', [
            'content' => view('grid.container', ['grid' => $this->getGrid()]),
            'pageTitle' => $this->getPageTitle()
        ]);
    }

    public function gridPhamChat($filter)
    {
        $params = $this->_parseFilter($filter);
        $gridJob = new PhamChatGrid('phamchat', 'App\Models\PhamChatTaiKhoanThang', 'phamchat', $params);
        $this->setGrid($gridJob);
        return $this->loadGridPhamChat();
    }

    public function newPhamChat()
    {
        if (!auth()->check())
            return;
        $id = Auth::id();
        $user = App\Models\User::find($id);
        $input = $this->_processData(Input::all());
        $data = \Session::get('staffData');
        if (!isset($data))
            return;
        if (!isset($input['_id']) || !isset($input['ghichu']) || !isset($input['diemtru']) || !isset($input['thang_id']))
            return;

        $tmp = App\Models\Dignity::where('_id', '=', $input['_id'])->first();
        if (!$tmp) {
            return;
        }
//        print_r(json_encode($tmp)); die();

        $phamchat = new App\Models\PhamChatTaiKhoanThang();
        $phamchat->name = $tmp->name;
        $phamchat->phamchat_id = $tmp->_id;
        $phamchat->diemtru = $tmp->diemtru;
        $phamchat->user_id = $data->_id;
        $phamchat->thang_id = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        if (App\Helpers\VaiTro::getEditPhong())
            $phamchat->pc_phongtru = $input['diemtru'];
        $phamchat->pc_bantru = $input['diemtru'];
        $phamchat->ghichu = $input['ghichu'];
        $phamchat->save();
        return;
    }

    public function updatePhamChat()
    {
        if (!auth()->check())
            return;
        $input = $this->_processData(Input::all());
        $data = \Session::get('staffData');
        if (!isset($data))
            return;
        if (!isset($input['_id']) || !isset($input['ghichu']) || !isset($input['diemtru']))
            return;
        $phamChat = App\Models\PhamChatTaiKhoanThang::find($input['_id']);
        if (!$phamChat)
            return;
        if (App\Helpers\VaiTro::getEditPhong())
            $phamChat->pc_phongtru = $input['diemtru'];
        $phamChat->pc_bantru = $input['diemtru'];
        $phamChat->ghichu = $input['ghichu'];
        $phamChat->save();
        return;
    }

    public function deletePhamChat()
    {
        if (!auth()->check())
            return;
        $input = $this->_processData(Input::all());
        $data = \Session::get('staffData');
        if (!isset($data))
            return;
        if (!isset($input['_id']))
            return;
        $phamChat = App\Models\PhamChatTaiKhoanThang::find($input['_id']);
        if (!$phamChat)
            return;
        $phamChat->delete();
        return;
    }

    /*
     * Đóng Ghóp
     */

    public function dongGop($productId = null)
    {
        $this->setGridId('staffJob');
        $this->setTabsId('staffJob');
        $data = \Session::get('staffData');
        $input = Input::all();
        if (isset($input['thang_id']) && $input['thang_id'] > 0) {
            $param['filter'] = $input;
            $param['filter']['thang_id'] = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        } else
            $param['filter']['thang_id'] = App\Helpers\Month::getCurrentMonth()->_id;
        if (isset($data)) {
            $param['filter']['user_id'] = $data->_id;
        }
        $gridJob = new DongGopGrid('donggop', 'App\Models\DongGopTaiKhoanThang', 'donggop', $param);
        $this->setGrid($gridJob);
        return $this->loadGridDongGop();
    }

    protected function loadGridDongGop()
    {
        return view('staffJob.review', [
            'content' => view('grid.container', ['grid' => $this->getGrid()]),
            'pageTitle' => $this->getPageTitle()
        ]);
    }

    public function gridDongGop($filter)
    {
        $params = $this->_parseFilter($filter);
        $gridJob = new DongGopGrid('donggop', 'App\Models\DongGopTaiKhoanThang', 'donggop', $params);
        $this->setGrid($gridJob);
        return $this->loadGridDongGop();
    }

    public function newDongGop()
    {
        if (!auth()->check())
            return;
        $id = Auth::id();
        $user = App\Models\User::find($id);
        $input = $this->_processData(Input::all());
        $data = \Session::get('staffData');
        if (!isset($data))
            return;
        if (!isset($input['_id']) || !isset($input['ghichu']) || !isset($input['diemtru']) || !isset($input['thang_id']))
            return;

        $tmp = App\Models\Contribute::where('_id', '=', $input['_id'])->first();
        if (!$tmp) {
            return;
        }
//        print_r(json_encode($tmp)); die();

        $phamchat = new App\Models\DongGopTaiKhoanThang();
        $phamchat->name = $tmp->name;
        $phamchat->donggop_id = $tmp->_id;
        $phamchat->diemcong = $tmp->diemcong;
        $phamchat->user_id = $data->_id;
        $phamchat->thang_id = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        if (App\Helpers\VaiTro::getEditPhong())
            $phamchat->dg_phongcong = $input['diemtru'];
        $phamchat->dg_bancong = $input['diemtru'];
        $phamchat->ghichu = $input['ghichu'];
        $phamchat->save();
        return;
    }

    public function updateDongGop()
    {
        if (!auth()->check())
            return;
        $input = $this->_processData(Input::all());
        $data = \Session::get('staffData');
        if (!isset($data))
            return;
        if (!isset($input['_id']) || !isset($input['ghichu']) || !isset($input['diemtru']))
            return;
        $donggop = App\Models\DongGopTaiKhoanThang::find($input['_id']);
        if (!$donggop)
            return;
        if (App\Helpers\VaiTro::getEditPhong())
            $donggop->dg_phongcong = $input['diemtru'];
        $donggop->dg_bancong = $input['diemtru'];
        $donggop->ghichu = $input['ghichu'];
        $donggop->save();
        return;
    }

    public function deleteDongGop()
    {
        if (!auth()->check())
            return;
        $input = $this->_processData(Input::all());
        $data = \Session::get('staffData');
        if (!isset($data))
            return;
        if (!isset($input['_id']))
            return;
        $donggop = App\Models\DongGopTaiKhoanThang::find($input['_id']);
        if (!$donggop)
            return;
        $donggop->delete();
        return;
    }

    public function updateCheckbox()
    {
        $input = $this->_processData(Input::all());
        if (!auth()->check())
            return;
        $data = \Session::get('staffData');
        if (!isset($data)) {
            return;
        }
        if (isset($input['thang_id']) && $input['thang_id'] > 0)
            $thang_id = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        else
            $thang_id = App\Helpers\Month::getCurrentMonth();
        $self = 0;
        if(isset($input['self']) && $input['self'] == 1)
            $self = 1;
        App\Helpers\DanhGia::updateStatusRate($thang_id,$self);
        return;
    }

    public function getstatusDanhGia()
    {
        $input = $this->_processData(Input::all());
        if (!auth()->check())
            return 0;
        $data = \Session::get('staffData');
        if (!isset($data)) {
            return 0;
        }
        if (isset($input['thang_id']) && $input['thang_id'] > 0)
            $thang_id = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        else
            $thang_id = App\Helpers\Month::getCurrentMonth();
        return App\Helpers\DanhGia::getStatusRate($thang_id);
    }
    public function isUpdate()
    {
        $input = $this->_processData(Input::all());
        if (!auth()->check())
            return 0;
        $data = \Session::get('staffData');
        if (!isset($data)) {
            return 0;
        }
        if (isset($input['thang_id']) && $input['thang_id'] > 0)
            $thang_id =  App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        else
            $thang_id = App\Helpers\Month::getCurrentMonth();
        return App\Helpers\DanhGia::isUpdateDanhGia($thang_id);
    }


}