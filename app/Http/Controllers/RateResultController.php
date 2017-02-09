<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 5/5/16
 * Time: 9:20 PM
 */

namespace App\Http\Controllers;

use Input;
use Maatwebsite\Excel\Facades\Excel;
use Psy\Util\Json;
use Redirect;
use Lang;
use View;
use App;
use App\Blocks\Quality\Tabs;
use App\Blocks\Result\Grid as GridReview;
use App\Blocks\Result\GridExport ;

use Auth;


class RateResultController extends Controller
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
            'pageTitle' => 'Danh Sách Nhân Viên',
            'product' => $product,
        ]);
        return view('result.edit')->with('reviewGrid', $reviewGrid);

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
        return view('result.edit')->with('reviewGrid', $reviewGrid);
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
    public function export($type='xlsx')
    {
        $input = Input::all();
        if (isset($input['position_id'])) {
            $input['chucdanh_id'] = $input['position_id'];
            unset($input['position_id']);
        }
        $param['filter'] = $input;
        $thang_name = "";

        if(isset($input['thang_id']) &&  $input['thang_id'] > 0) {
            $thang_id = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
            $param['filter']['thang_id'] = $thang_id;
            $thang_name = App\Helpers\Month::getThangByID($thang_id);

        }
        $thang_name = str_replace("/","-",$thang_name);
        $gridReview = new GridReview('Kết Quả DGLD '.$thang_name, 'App\Models\User', 'Kết Quả DGLD '.$thang_name, $param);
        $this->exportFile($type, $gridReview);
    }

    public function exportAll($type='xlsx')
    {
        $input = Input::all();
        if (isset($input['position_id'])) {
            $input['chucdanh_id'] = $input['position_id'];
            unset($input['position_id']);
        }
        $param['filter'] = $input;
        $thang_name = "";
        if (isset($input['thang_id']) &&  $input['thang_id'] > 0) {
            $thang_id = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
            $param['filter']['thang_id'] = $thang_id;
            $thang_name = App\Helpers\Month::getThangByID($thang_id);

        } else {
            $thang_id = App\Helpers\Month::getCurrentMonth()->_id;
            $param['filter']['thang_id'] = $thang_id;
            $thang_name = App\Helpers\Month::getThangByID($thang_id);
        }
        $thang_name = str_replace("/","-",$thang_name);
        $gridReview = new GridExport('DGLD TKBT '.$thang_name, 'App\Models\User', 'DGLD TKBT '.$thang_name, $param);
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
        if(isset($input['thang_id']) &&  $input['thang_id'] > 0)
            $param['filter']['thang_id'] = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        else
            $param['filter']['thang_id'] = App\Helpers\Month::getCurrentMonth()->_id;
        if(!(isset($input['room_id'])) || $input['room_id'] <= 0) {
            $id = Auth::id();

            $user = App\Models\User::find($id);
            $param['filter']['room_id'] = $user->room_id;
            $input['room_id'] = $user->room_id;
        }
        $gridReview = new GridReview('results', 'App\Models\User', 'results', $param);
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

    public function apply(){
        $input = Input::all();
        $un_apply = isset($input['un_apply'])?$input['un_apply'] : 0;
        if(!isset($input['room_id']) || $input['room_id'] < 0) {
            die('1');
            return;
        }

        if(isset($input['thang_id']) && $input['thang_id'] > 0){
            $thang_id = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        } else {
            $thang_id = App\Helpers\Month::getCurrentMonth()->_id;

        }

        $users = App\Models\User::where('room_id','=', $input['room_id'])->get();
        foreach($users as $user){
            App\Helpers\DanhGia::applyRate($user->_id,$thang_id,$un_apply);
        }
        die('1');
        return;

    }
    public function applyAll(){
        $input = Input::all();
        if(!App\Helpers\VaiTro::getEditBan())
            return;
        $un_apply = isset($input['un_apply'])?$input['un_apply'] : 0;
        if(isset($input['thang_id']) && $input['thang_id'] > 0){
            $thang_id = App\Helpers\Month::getMonthIdByDate($input['thang_id']);
        } else {
            $thang_id = App\Helpers\Month::getCurrentMonth()->_id;
        }
        $users = App\Models\User::all();
        foreach($users as $user){
            App\Helpers\DanhGia::applyRate($user->_id,$thang_id,$un_apply);
        }
        return;

    }
    public function printKetQua(){
        $input = Input::all();
        if(!isset($input["thang_id"]))
            return;
        if (isset($input['thang_id']) &&  $input['thang_id'] > 0) {
            $thang_id = App\Helpers\Month::getMonthIdByDate($input['thang_id']);

        } else {
            $thang_id = App\Helpers\Month::getCurrentMonth()->_id;
        }
        Excel::create('KẾT QUẢ DGLD', function ($excel) {

            $excel->sheet('Sheetname', function ($sheet) {

                $input = Input::all();

                if (isset($input['thang_id']) &&  $input['thang_id'] > 0) {
                    $thang_id = App\Helpers\Month::getMonthIdByDate($input['thang_id']);

                } else {
                    $thang_id = App\Helpers\Month::getCurrentMonth()->_id;
                }
                $input["thang_id"] = $thang_id;
                $thang_name = App\Helpers\Month::getThangByID($thang_id);
                // first row styling and writing content

                $sheet->setFontFamily('Times New Roman');

                $sheet->mergeCells('A1:J1');
                $sheet->row(1, function ($row) {
                    $row->setFontSize(22);
                });

                $sheet->row(1, array('ĐÀI TRUYỀN HÌNH VIỆT NAM'));
                $sheet->row(2,function($row){
                    $row->setFontSize(22);
                });
                $sheet->cell('A2', function($cell) {
                    $cell->setValue('BAN THƯ KÝ BIÊN TẬP');

                });
                    // second row styling and writing content
                $sheet->row(3, function ($row) {

                    $row->setFontSize(20);
//                    $row->setFontWeight('bold');
//                    $row->setAlignment('center');

                });
                $sheet->mergeCells('D3:J3');
                $sheet->cell('D3', function($cell) {
                    $cell->setValue('KẾT QUẢ ĐÁNH GIÁ LAO ĐỘNG');
                    $cell->setAlignment('center');
                });
                $sheet->mergeCells('D4:J4');
                $sheet->cell('D4', $thang_name);
                $sheet->mergeCells('D5:J5');

//                $sheet->cell('D5', function($cell) {
//                    $cell->setValue('(Ban hành kèm theo Quyết định số:         /QĐ-BĐT ngày        tháng       năm 2016 của Ban Thư Ký Biên Tập)');
//                    $cell->setAlignment('center');
//                });

                $sheet->mergeCells('A6:J6');
//                $sheet->row(2, array('Something else here'));
                $sheet->setWidth('A', 10);
                $sheet->setWidth('B', 30);
                $sheet->setWidth('C', 30);
                $sheet->setWidth('D', 20);

                $sheet->setWidth('E', 20);
                $sheet->setWidth('F', 20);
                $sheet->setWidth('G', 20);
                $sheet->setWidth('H', 20);
                $sheet->setWidth('I', 20);
                $sheet->setWidth('J', 20);
                $sheet->setWidth('K', 20);
                $sheet->setWidth('L', 30);







                $sheet->row(7, function ($row) {
                    $row->setFontSize(14);
                });
                $sheet->cell('A7', function($cell) {
                    $cell->setValue('STT');
                    $cell->setFontSize(14);
                });
                $sheet->cell('B7', function($cell) {
                    $cell->setValue('Họ Tên');
                    $cell->setFontSize(14);

                });
                $sheet->cell('C7', function($cell) {
                    $cell->setValue('Chức Vụ/Chức Danh');
                    $cell->setFontSize(14);

                });
                $sheet->cell('D7', function($cell) {
                    $cell->setValue('KHỐI LƯỢNG (30)');
                    $cell->setFontSize(14);

                });
                $sheet->cell('E7', function($cell) {
                    $cell->setValue('CHẤT LƯỢNG (30)');
                    $cell->setFontSize(14);
                });
                $sheet->cell('F7', function($cell) {
                    $cell->setValue('TIẾN ĐỘ (10)');
                    $cell->setFontSize(14);

                });
                $sheet->cell('G7', function($cell) {
                    $cell->setValue('PHẨM CHẤT (5)');
                    $cell->setFontSize(14);
                });
                $sheet->cell('H7', function($cell) {
                    $cell->setValue('KỶ LUẬT (15)');
                    $cell->setFontSize(14);

                });
                $sheet->cell('I7', function($cell) {
                    $cell->setValue('ĐÓNG GÓP (10)');
                    $cell->setFontSize(14);

                });
                $sheet->cell('J7', function($cell) {
                    $cell->setValue('TỔNG ĐIỂM');
                });
                $sheet->cell('K7', function($cell) {
                    $cell->setValue('BAN XẾP LOẠI');
                    $cell->setFontSize(14);

                });
                $sheet->cell('L7', function($cell) {
                    $cell->setValue('Ghi Chú');
                    $cell->setFontSize(14);

                });


                // getting data to display - in my case only one record
                $rooms = App\Models\Room::where('_id','>',0)->orderBy('seq_no','ASC')->get();
                $i = 8;
                $j = 1;;
                foreach($rooms as $room){
                    $temp = App\Helpers\Room::getID($room->seq_no);
                    $sheet->row($i, function ($row) {
                        $row->setFontSize(22);
                    });
                    $sheet->cell('A'.$i, $temp) ;
                    $sheet->cell('B'.$i, $room->name);
                    $i++;
                    $users = App\Models\User::where('room_id','=',$room->_id)->orderBy('seq_no','ASC')->get();
                    foreach($users as $user){
                        $data = App\Helpers\DanhGia::ketQuaDanhGia($user->_id,$input['thang_id']);
                        $sheet->cell('A'.$i, $j) ;
                        $sheet->cell('B'.$i, $user->first_name) ;
                        $sheet->cell('C'.$i, App\Helpers\Position::getPosition($user->chucdanh_id)) ;
                        $sheet->cell('D'.$i, $data['chuyenmon']) ;
                        $sheet->cell('E'.$i, $data['chatluong']) ;
                        $sheet->cell('F'.$i, $data['tiendo']) ;
                        $sheet->cell('G'.$i, $data['phamchat']) ;
                        $sheet->cell('H'.$i, $data['kyluat']) ;
                        $sheet->cell('I'.$i, $data['donggop']) ;
                        $sheet->cell('J'.$i, $data['tongdiem']) ;
                        $sheet->cell('K'.$i, $data['xeploai']) ;
//                        $sheet->cell('L'.$i, $data['ghichu']) ;
//                        $sheet->getStyle('L'.$i)->getAlignment()->setWrapText(true);

                        $i++;
                        $j++;

                    }
                }


                $sheet->cell('H'.($i+2),'Hà Nội, Ngày    Tháng   Năm' ) ;

                $sheet->row($i+3, function ($row) {
                    $row->setFontSize(22);
                });

                $sheet->cell('B'.($i+3),'NGƯỜI LẬP BẢNG' ) ;
                $sheet->cell('H'.($i+3),'TRƯỞNG BAN' ) ;

                $sheet->cell('B'.($i+6),'Bùi Văn Thành' ) ;
                $sheet->cell('H'.($i+6),'Nguyễn Hà Nam' ) ;



            });

        })->export('xls');

    }

    public function printReport() {
        $input = Input::all();
        if(!isset($input['start_month']) || !isset($input['end_month']))
            return ;

        Excel::create('KẾT QUẢ DGLD', function ($excel) {

            $excel->sheet('Sheetname', function ($sheet) {

                $input = Input::all();
                $months = App\Helpers\Month::getMonthIds($input['start_month'],$input['end_month']);


                $sheet->setFontFamily('Times New Roman');
                $sheet->mergeCells('A1:J1');
                $sheet->row(1, function ($row) {
                    $row->setFontSize(22);
                });

                $sheet->row(1, array('ĐÀI TRUYỀN HÌNH VIỆT NAM'));
                $sheet->row(2,function($row){
                    $row->setFontSize(22);
                });
                $sheet->cell('A2', function($cell) {
                    $cell->setValue('BAN THƯ KÝ BIÊN TẬP');

                });
                // second row styling and writing content
                $sheet->row(3, function ($row) {

                    $row->setFontSize(20);
//                    $row->setFontWeight('bold');
//                    $row->setAlignment('center');

                });
                $sheet->mergeCells('D3:J3');
                $sheet->cell('D3', function($cell) {
                    $cell->setValue('KẾT QUẢ ĐÁNH GIÁ LAO ĐỘNG');
                    $cell->setAlignment('center');
                });
//                $sheet->mergeCells('D4:J4');
//                $sheet->cell('D4', 'Từ Ngày: '. $input['start_month'] . ' - Đến Ngày: ' .$input['end_month']);
//                $sheet->mergeCells('D5:J5');
//
//                $sheet->cell('D5', function($cell) {
//                    $cell->setValue('(Ban hành kèm theo Quyết định số:         /QĐ-BĐT ngày        tháng       năm 2016 của Ban Thư Ký Biên Tập)');
//                    $cell->setAlignment('center');
//                });

                $sheet->mergeCells('A6:J6');
//                $sheet->row(2, array('Something else here'));
                $sheet->setWidth('A', 10);
                $sheet->setWidth('B', 30);

                $sheet->row(7, function ($row) {
                    $row->setFontSize(14);
                });
                $sheet->cell('A7', function($cell) {
                    $cell->setValue('STT');
                    $cell->setFontSize(14);
                });
                $sheet->cell('B7', function($cell) {
                    $cell->setValue('Họ Tên');
                    $cell->setFontSize(14);

                });

                $row = 7;
                $column = 'C';
                for($k = 0; $k < count($months) ; $k++ ){
                    $thang_name = substr($months[$k]->name,0,strpos($months[$k]->name,'/'));
                    $sheet->cell($column.$row, $thang_name);
                    $tmp = $column.$row.':'.(++$column).$row;
                    $sheet->mergeCells($tmp);
                    $column++;

                }
                $sheet->cell($column.$row, function($cell) {
                    $cell->setValue('Số A*');

                });
                $column++;
                $sheet->setWidth($column, 30);

                $sheet->cell($column.$row, function($cell) {
                    $cell->setValue('NVTB');

                });


                $row = 8;
                $column = 'C';
                for($k = 0; $k < 2*count($months) ; $k++ ){
                    if($k%2 != 0) {
                        $sheet->cell($column.$row, 'TD');
                    } else {
                        $sheet->cell($column . $row, 'XL');
                    }
                    $column++;
                }



                // getting data to display - in my case only one record
                $rooms = App\Models\Room::where('_id','>',0)->orderBy('seq_no','ASC')->get();
                $i = 9;
                $j = 1;;
                foreach($rooms as $room){
                    $temp = App\Helpers\Room::getID($room->seq_no);
//                    $sheet->row($i, function ($row) {
//                        $row->setFontSize(22);
//                    });
//                    $sheet->cell('A'.$i, $temp) ;
//                    $sheet->cell('B'.$i, $room->name);
//                    $i++;
                    $users = App\Models\User::where('room_id','=',$room->_id)->orderBy('seq_no','ASC')->get();
                    foreach($users as $user){
                        $sheet->cell('A'.$i, $j);
                        $sheet->cell('B'.$i, $user->first_name) ;
                        $column = 'C';
                        $num_A_plus = 0;
                        $tieu_bieu = "";
                        foreach($months as $month) {
                            $data = App\Helpers\DanhGia::ketQuaDanhGia($user->_id,$month->_id);
                            $xeploai = $data['xeploai'] ?:'_';
                            $tongdiem = $data['tongdiem']?:'_';
                            $sheet->cell($column.$i,$xeploai) ;
                            $column++;
                            $sheet->cell($column.$i,$tongdiem ) ;
                            $column++;
                            if($data['xeploai'] == 'A*')
                                $num_A_plus++;
                            if(App\Helpers\Mvp::isTieuBieu($user->_id,$month->_id)) {
                                $thang_name = substr($month->name,0,strpos($month->name,'/'));
                                if(strlen($tieu_bieu) > 1) {
                                    $tieu_bieu =$tieu_bieu . ', ' .  $thang_name;
                                } else {
                                    $tieu_bieu = $thang_name;
                                }
                            }

                        }
                        $sheet->cell($column.$i,$num_A_plus) ;
                        $column++;
                        $sheet->cell($column.$i,$tieu_bieu) ;

                        $i++;
                        $j++;
                    }
                }


                $sheet->cell('H'.($i+2),'Hà Nội, Ngày    Tháng   Năm' ) ;

                $sheet->row($i+3, function ($row) {
                    $row->setFontSize(22);
                });

                $sheet->cell('B'.($i+3),'NGƯỜI LẬP BẢNG' ) ;
                $sheet->cell('H'.($i+3),'TRƯỞNG BAN' ) ;

                $sheet->cell('B'.($i+6),'Bùi Văn Thành' ) ;
                $sheet->cell('H'.($i+6),'Nguyễn Hà Nam' ) ;



            });

        })->export('xls');
    }

    public function test1(){
        Excel::create('ExcelExport', function ($excel) {

            $excel->sheet('Sheetname', function ($sheet) {

                // first row styling and writing content
                $sheet->mergeCells('A1:J1');
                $sheet->row(1, function ($row) {
                    $row->setFontSize(22);
                });

                $sheet->row(1, array('ĐÀI TRUYỀN HÌNH VIỆT NAM'));

                $sheet->mergeCells('A2:J2');
                $sheet->row(2, function ($row) {
                    $row->setFontSize();
                });
                $sheet->row(2, array('BAN THƯ KÝ BIÊN TẬP'));

                $sheet->mergeCells('A3:M3');
                $sheet->row(3, function ($row) {
                    $row->setFontSize(30);
                    $row->setAlignment('VERTICAL_CENTER');
                });
                $sheet->row(3, array('KẾT QUẢ ĐÁNH GIÁ LAO ĐỘNG '));



                // second row styling and writing content
//                $sheet->row(2, function ($row) {
//
//                    // call cell manipulation methods
//                    $row->setFontFamily('Comic Sans MS');
//                    $row->setFontSize(15);
//                    $row->setFontWeight('bold');
//
//                });
//                $sheet->cell('A2', function($cell) {
//                    $cell->setValue('this is the cell value.');
//                });
//                $sheet->cell('D2', function($cell) {
//                    $cell->setValue('this is the cell D2.');
//                });

//                $sheet->row(2, array('Something else here'));


                // getting data to display - in my case only one record
                $users = App\Models\User::get()->toArray();

                // setting column names for data - you can of course set it manually
                $sheet->appendRow(array_keys($users[0])); // column names

                // getting last row number (the one we already filled and setting it to bold
                $sheet->row($sheet->getHighestRow(), function ($row) {
                    $row->setFontWeight('bold');
                });

                // putting users data as next rows
                foreach ($users as $user) {
                    $sheet->appendRow($user);
                }
                $sheet->appendRow(array_keys($users[0])); // column names


            });

        })->export('xls');

    }

}
