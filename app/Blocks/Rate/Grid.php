<?php namespace App\Blocks\Rate;

use App\Blocks\BaseGrid;
use App\Helpers\Level;
use App\Helpers\Position;
use App\Helpers\Room;
use URL;
use Lang;
use DB;
use App\Helpers\Calculator;
class Grid extends BaseGrid
{
    public function __construct($gridId, $resource, $collectionKey, $params = null, $toExport = false)
    {
        $this->setTitle(Lang::get(''));
        $this->setGridUrl(URL::to('rates/index'));
        $this->setAjaxGridUrl(URL::route('rates.grid'));
        parent::__construct($gridId, $resource, $collectionKey, $params, $toExport);
    }

    protected function _addButtons()
    {
//        parent::_addButtons();
//        $this->_addButton('add', [
//            'url' => URL::route('users.create'),
//            'label' => Lang::get('general.add_new')
//        ]);
    }

    protected function _addGridButtons()
    {
//        $this->_addGridButton('download', [
//            'url' => URL::route('users.export', ['xlsx']),
//            'label' => Lang::get('general.export_excel')
//        ]);
//        parent::_addGridButtons();
    }

    /*
    * Add Massactions
    *
    * input array
    * return collection
    * */
    protected function _addMassactions()
    {
//        $this
//            ->_addMassaction('delete', [
//                'label' => Lang::get('general.delete'),
//                'url' => URL::route('users.mass-delete'),
//                'confirm' => Lang::get('general.are_you_sure'),
//            ]);
    }

    protected function _addColumns()
    {
        $this
            ->_addColumn('first_name', [
                'label' =>'Họ Tên',
                'filter' =>false,
            ])
            ->_addColumn('room_id', [
                'label' => 'Phòng',
                'type' =>'select',
                'filter' =>false,
                'options' => Room::getListRoom(),

            ])
            ->_addColumn('level_id', [
                'label' => 'Bậc',
                'type' =>'select',
                'filter' =>false,
                'options' => Level::getListLevel(),
            ])
            ->_addColumn('chucdanh_id', [
                'label' => 'Chức Danh',
                'type' =>'select',
                'filter' =>false,
                'options' => Position::getAllPositions()
            ])
            ->_addColumn('tudanhgia', [
                'label' => 'Tự Đánh Giá',

                'filter' =>false,

            ])
            ->_addColumn('phongdanhgia', [
                'label' => 'Phòng Đánh Giá',
                'filter' =>false,

            ])
            ->_addColumn('bandanhgia', [
                'label' => 'Ban Đánh Giá',
                'filter' =>false,

            ])

            ->_addColumn('action', [
                'label' => 'Đánh Giá',
                'type' => 'action',
                'align' => 'center',
                'links' => [
                    [
                        'route' => 'rates.edit',
                        'fields' => ['_id'],
                        'getters' => ['_id'],
                        'type' => 'edit',
                        'label' =>'Giao Việc',
                        'options' => ['title' => 'Đánh Giá']
//                        'onclick' =>'return false',
//                        'name' => 'editdanhgia'],
                    ],
                ],
                'filter' => false,
                'sort' => false,
            ]);
    }
    public function getList()
    {
        $query = $this->getFilterParams();
        $model = DB::table('users')
            ->join('danhgia', 'users._id', '=', 'danhgia.user_id')
            ->where('thang_id','=',$query['filter']['thang_id'])
            ->where('room_id','=',$query['filter']['room_id'])
            ->where('users.deleted_at', '=', null)
            ->select('*', 'users._id');

        $thang_id = isset($query['filter']['thang_id'])?$query['filter']['thang_id']:0;
        unset($query['filter']['room_id']);
        unset($query['filter']['thang_id']);
        if (isset($query['filter'])) {
            foreach ($query['filter'] as $key => $val) {
                if (is_array($val)) {
                    if (isset($val['like'])) {
                        $model = $model->where($key, 'like', '%' . $val['like'] . '%');
                    }
                    if (isset($val['from'])) {
                        $model = $model->where( $key, '>=', $val['from']);
                    }
                    if (isset($val['to'])) {
                        $model = $model->where($key, '<=', $val['to']);
                    }
                } else {
                    $model = $model->where($key, '=', $val);
                }
            }
        }

        if (isset($query['order']) && $query['order'] != 'seq_no') {
            if ($query['order'] == 'users._id' || $query['order'] == 'status')
                $model = $model->orderBy( 'users.'.$query['order'], $query['dir']);
            else
                $model = $model->orderBy( 'users.'.$query['order'], $query['dir']);
        }
        $offset = isset($query['page']) ? 20 * ($query['page'] - 1) : 0;
        $total = $model->count();
        $rows = $model->skip($offset)->take(20)->get();
        $ids = $model->lists('_id');
        if($thang_id > 0){
            foreach($rows as $key =>$value){
                $chuyenmon = Calculator::getDiemChuyenMon($value->_id, $thang_id);
                if($chuyenmon['tucham'] > 0)
                {
                    $kyluat = Calculator::getDiemKyLuat($value->_id, $thang_id);
                    $tiendo = Calculator::getDiemTienDo($value->_id, $thang_id);
                    $chatluong = Calculator::getDiemChatLuong($value->_id, $thang_id);
                    $phamchat = Calculator::getDiemPhamChat($value->_id, $thang_id);
                    $donggop = Calculator::getDiemDongGop($value->_id, $thang_id);
                    if($value->tudanhgia == 1)
                    $value->tudanhgia = $chuyenmon["tucham"] + $tiendo["tucham"] + $donggop["tucham"]
                        + $chatluong["tucham"] + $kyluat["tucham"] + $phamchat["tucham"]." (Đã Duyệt)";
                    else
                        $value->tudanhgia = $chuyenmon["tucham"] + $tiendo["tucham"] + $donggop["tucham"]
                            + $chatluong["tucham"] + $kyluat["tucham"] + $phamchat["tucham"]." (Chưa Duyệt)";
                    if($value->phongdanhgia == 1)
                        $value->phongdanhgia = $chuyenmon["phongcham"] + $tiendo["phongcham"] + $donggop["phongcham"]
                            + $chatluong["phongcham"] + $kyluat["phongcham"] + $phamchat["phongcham"]." (Đã Duyệt)";
                    else
                        $value->phongdanhgia = $chuyenmon["phongcham"] + $tiendo["phongcham"] + $donggop["phongcham"]
                            + $chatluong["phongcham"] + $kyluat["phongcham"] + $phamchat["phongcham"]." (Chưa Duyệt)";
                    if($value->bandanhgia == 1)
                        $value->bandanhgia = $chuyenmon["bancham"] + $tiendo["bancham"] + $donggop["bancham"]
                            + $chatluong["bancham"] + $kyluat["bancham"] + $phamchat["bancham"]." (Đã Duyệt)";
                    else
                        $value->bandanhgia = $chuyenmon["bancham"] + $tiendo["bancham"] + $donggop["bancham"]
                            + $chatluong["bancham"] + $kyluat["bancham"] + $phamchat["bancham"]." (Chưa Duyệt)";
                } elseif ( $chuyenmon['phongcham'] > 0) {
                    $kyluat = Calculator::getDiemKyLuat($value->_id, $thang_id);
                    $tiendo = Calculator::getDiemTienDo($value->_id, $thang_id);
                    $chatluong = Calculator::getDiemChatLuong($value->_id, $thang_id);
                    $phamchat = Calculator::getDiemPhamChat($value->_id, $thang_id);
                    $donggop = Calculator::getDiemDongGop($value->_id, $thang_id);

                    $value->tudanhgia = ' Chưa DG';

                    if($value->phongdanhgia == 1)
                        $value->phongdanhgia = $chuyenmon["phongcham"] + $tiendo["phongcham"] + $donggop["phongcham"]
                            + $chatluong["phongcham"] + $kyluat["phongcham"] + $phamchat["phongcham"]." (Đã Duyệt)";
                    else
                        $value->phongdanhgia = $chuyenmon["phongcham"] + $tiendo["phongcham"] + $donggop["phongcham"]
                            + $chatluong["phongcham"] + $kyluat["phongcham"] + $phamchat["phongcham"]." (Chưa Duyệt)";
                    if($value->bandanhgia == 1)
                        $value->bandanhgia = $chuyenmon["bancham"] + $tiendo["bancham"] + $donggop["bancham"]
                            + $chatluong["bancham"] + $kyluat["bancham"] + $phamchat["bancham"]." (Đã Duyệt)";
                    else
                        $value->bandanhgia = $chuyenmon["bancham"] + $tiendo["bancham"] + $donggop["bancham"]
                            + $chatluong["bancham"] + $kyluat["bancham"] + $phamchat["bancham"]." (Chưa Duyệt)";

                } elseif ($chuyenmon['bancham'] > 0 ) {
                    $kyluat = Calculator::getDiemKyLuat($value->_id, $thang_id);
                    $tiendo = Calculator::getDiemTienDo($value->_id, $thang_id);
                    $chatluong = Calculator::getDiemChatLuong($value->_id, $thang_id);
                    $phamchat = Calculator::getDiemPhamChat($value->_id, $thang_id);
                    $donggop = Calculator::getDiemDongGop($value->_id, $thang_id);

                    $value->tudanhgia = ' Chưa DG';

                    $value->phongdanhgia = 'Chưa DG' ;

                    if($value->bandanhgia == 1)
                        $value->bandanhgia = $chuyenmon["bancham"] + $tiendo["bancham"] + $donggop["bancham"]
                            + $chatluong["bancham"] + $kyluat["bancham"] + $phamchat["bancham"]." (Đã Duyệt)";
                    else
                        $value->bandanhgia = $chuyenmon["bancham"] + $tiendo["bancham"] + $donggop["bancham"]
                            + $chatluong["bancham"] + $kyluat["bancham"] + $phamchat["bancham"]." (Chưa Duyệt)";

                }

            }
        }
        return [
            'all_ids' => $ids,
            'items' => $rows,
            'total' => $total,
            'page_size' => 20,
            'from' => $offset,
        ];
    }

    public function getRowUrl($row)
    {
        return URL::route('rates.edit', $row->_id);
    }
}