<?php namespace App\Blocks\Classification;

use App\Blocks\BaseGrid;
use App\Helpers\Calculator;
use App\Helpers\Level;
use App\Helpers\Position;
use App\Helpers\Room;
use App\Helpers\VaiTro;
use App\Helpers\XepLoai;
use URL;
use Lang;
use DB;
use Illuminate\Pagination\Paginator;

class GridExport extends BaseGrid
{
    public function __construct($gridId, $resource, $collectionKey, $params = null, $toExport = false)
    {
        $this->setTitle(Lang::get(''));
        $this->setGridUrl(URL::to('classification/index'));
        $this->setAjaxGridUrl(URL::route('classification.grid'));
        parent::__construct($gridId, $resource, $collectionKey, $params, $toExport);
    }

    protected function _addButtons()
    {
    }

    protected function _addGridButtons()
    {
//        $this->_addGridButton('download', [
//            'url' => URL::route('result.export', ['xlsx']),
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

    }

    protected function _addColumns()
    {
        $this
            ->_addColumn('first_name', [
                'label' => 'Họ Tên',
                'filter' => false,
                'sort' => false,
                'width' => '90px'
            ])
            ->_addColumn('room_id', [
                'label' => 'Phòng',
                'type' =>'select',
                'options' => Room::getListRoom(),

            ])
            ->_addColumn('chucdanh_id', [
                'label' => 'Chức Danh 1',
                'type' => 'select',
                'filter' => false,
                'options' => Position::getAllPositions(),
                'sort' => false,
                'width' => '50px'
            ])
            ->_addColumn('tucham', [
                'label' => 'Tự Chấm',
                'type' => 'number',
                'filter' => false,
                'sort' => false,
                'width' => '30px'
            ])
            ->_addColumn('tuxeploai', [
                'label' => 'Tự XL',
                'type' => 'number',
                'filter' => false,
                'sort' => false,
                'width' => '30px'
            ])
            ->_addColumn('phongcham', [
                'label' => 'Phòng Chấm',
                'type' => 'number',
                'filter' => false,
                'sort' => false,
                'width' => '30px'
            ])
            ->_addColumn('phongxeploai', [
                'label' => 'Phòng XL',
                'type' => 'number',
                'filter' => false,
                'sort' => false,
                'width' => '30px'
            ])
            ->_addColumn('bancham', [
                'label' => 'Ban Chấm',
                'type' => 'number',
                'filter' => false,
                'sort' => false,
                'width' => '30px'
            ])
            ->_addColumn('banxeploai', [
                'label' => 'Ban XL',
                'type' => 'text',
                'filter' => false,
                'sort' => false,
                'width' => '30px',
                'editable' => VaiTro::getEditBan()
            ])
//            ->_addColumn('tongdiem', [
//                'label' => 'Tổng Điểm',
//                'type' => 'number',
//                'filter' => false,
//                'sort' => false,
//                'width' => '30px'
//            ])
            ->_addColumn('ghichu', [
                'label' => 'Ghi Chú',
                'type' => 'text',
                'filter' => false,
                'sort' => false,
            ])
            ->_addColumn('action', [
                'label' => 'Xem',
                'type' => 'action',
                'align' => 'center',
                'width' => '30px',
                'links' => [
                    [
                        'route' => 'staffs.edit',
                        'fields' => ['_id'],
                        'getters' => ['_id'],
                        'type' => 'edit',
                        'label' => 'Giao Việc',
                        'options' => ['title' => 'Giao Việc'],
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
            ->where('room_id', '<>', 0)->where('_id','<>',29)
            ->where('users.deleted_at', '=', null)
            ->select('*', 'users._id');
        $thang_id = $query['filter']['thang_id'];
        unset($query['filter']['room_id']);
        unset($query['filter']['thang_id']);
        if (isset($query['filter'])) {
            foreach ($query['filter'] as $key => $val) {
                if (is_array($val)) {
                    if (isset($val['like'])) {
                        $model = $model->where($key, 'like', '%' . $val['like'] . '%');
                    }
                    if (isset($val['from'])) {
                        $model = $model->where($key, '>=', $val['from']);
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
            if ($query['order'] == '_id' || $query['order'] == 'status')
                $model = $model->orderBy($query['order'], $query['dir']);
            else
                $model = $model->orderBy($query['order'], $query['dir']);
        }
        $total = $model->count();
        $offset = 0;
        $rows = $model->skip($offset)->take($total)->get();
        foreach ($rows as $key => $value) {
            $chuyenmon = Calculator::getDiemChuyenMon($value->_id, $thang_id);
            if ($chuyenmon["tucham"] > 0) {
                $kyluat = Calculator::getDiemKyLuat($value->_id, $thang_id);
                $tiendo = Calculator::getDiemTienDo($value->_id, $thang_id);
                $chatluong = Calculator::getDiemChatLuong($value->_id, $thang_id);
                $phamchat = Calculator::getDiemPhamChat($value->_id, $thang_id);
                $donggop = Calculator::getDiemDongGop($value->_id, $thang_id);
                $value->tucham = $chuyenmon["tucham"] + $tiendo["tucham"] + $donggop["tucham"] + $chatluong["tucham"] + $kyluat["tucham"] + $phamchat["tucham"];
                $value->tuxeploai = XepLoai::XepLoai($value->tucham);
                $value->phongcham = $chuyenmon["phongcham"] + $tiendo["phongcham"] + $donggop["phongcham"] + $chatluong["phongcham"] + $kyluat["phongcham"] + $phamchat["phongcham"];
                $value->phongxeploai = XepLoai::XepLoai($value->phongcham);
                $value->bancham = $chuyenmon["bancham"] + $tiendo["bancham"] + $donggop["bancham"] + $chatluong["bancham"] + $kyluat["bancham"] + $phamchat["bancham"];
                $value->banxeploai = XepLoai::BanXepLoai($thang_id,$value->_id,$value->bancham);
                $ghichu ="";
                $ghichu = $this->addString($ghichu,$chuyenmon["ghichu"]);
                $ghichu = $this->addString($ghichu,$tiendo["ghichu"]);
                $ghichu = $this->addString($ghichu,$chatluong["ghichu"]);
                $ghichu = $this->addString($ghichu,$kyluat["ghichu"]);
                $ghichu = $this->addString($ghichu,$phamchat["ghichu"]);
                $ghichu = $this->addString($ghichu,$donggop["ghichu"]);
                $value->ghichu = $ghichu;
            } else
                $value->ghichu = 'Chưa Đánh Giá';
        }
        $ids = $model->lists('_id');
        return [
            'all_ids' => $ids,
            'items' => $rows,
            'total' => $total,
            'page_size' => $total,
            'from' => $offset,
        ];
    }
    public function addString($a, $b)
    {
        if (strlen($a) > 0 && strlen($b) > 0)
            return $a . "; " . $b;
        if (strlen($a) > 0)
            return $a;
        else
            return $b;
    }
    public function setCollection()
    {
        $data = $this->getList();
        $this->_allIds = $data['all_ids'];
        $this->_itemTotal = $data['total'];
        $this->_limit = $data['total'];
        $this->_collection = $this->_toExport ? json_decode(json_encode($data['items'])) :
            new Paginator(json_decode(json_encode($data['items'])), $this->getLimit(), 1);
    }
}