<?php namespace App\Blocks\Result;

use App\Blocks\BaseGrid;
use App\Helpers\Calculator;
use App\Helpers\Level;
use App\Helpers\Position;
use App\Helpers\Room;
use URL;
use Lang;
use DB;

class Grid extends BaseGrid
{
    public function __construct($gridId, $resource, $collectionKey, $params = null, $toExport = false)
    {
        $this->setTitle(Lang::get(''));
        $this->setGridUrl(URL::to('result/index'));
        $this->setAjaxGridUrl(URL::route('result.grid'));
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
            ->_addColumn('chucdanh_id', [
                'label' => 'Chức Danh',
                'type' => 'select',
                'filter' => false,
                'options' => Position::getAllPositions(),
                'sort' => false,
                'width' => '50px'
            ])
            ->_addColumn('chuyenmon', [
                'label' => 'Khối Lượng',
                'type' => 'number',
                'filter' => false,
                'sort' => false,
                'width' => '30px'
            ])
            ->_addColumn('chatluong', [
                'label' => 'Chất Lượng',
                'type' => 'number',
                'filter' => false,
                'sort' => false,
                'width' => '30px'
            ])
            ->_addColumn('phamchat', [
                'label' => 'Phẩm Chất',
                'type' => 'number',
                'filter' => false,
                'sort' => false,
                'width' => '30px'
            ])
            ->_addColumn('kyluat', [
                'label' => 'Kỷ Luật',
                'type' => 'number',
                'filter' => false,
                'sort' => false,
                'width' => '30px'
            ])
            ->_addColumn('tiendo', [
                'label' => 'Tiến Độ',
                'type' => 'number',
                'filter' => false,
                'sort' => false,
                'width' => '30px'
            ])
            ->_addColumn('donggop', [
                'label' => 'Đóng Góp',
                'type' => 'number',
                'filter' => false,
                'sort' => false,
                'width' => '30px'
            ])
            ->_addColumn('tongdiem', [
                'label' => 'Tổng Điểm',
                'type' => 'number',
                'filter' => false,
                'sort' => false,
                'width' => '30px'
            ])
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
                        'options' => ['title' => 'Giao Việc',
                            'onclick' =>'return false',],

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
            ->where('room_id', '=', $query['filter']['room_id'])
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
        $offset = isset($query['page']) ? 15 * ($query['page'] - 1) : 0;
        $rows = $model->skip($offset)->take(15)->get();
        foreach ($rows as $key => $value) {
            $chuyenmon = Calculator::getDiemChuyenMon($value->_id, $thang_id);
            if ($chuyenmon["bancham"] > 0) {
                $kyluat = Calculator::getDiemKyLuat($value->_id, $thang_id);
                $tiendo = Calculator::getDiemTienDo($value->_id, $thang_id);
                $chatluong = Calculator::getDiemChatLuong($value->_id, $thang_id);
                $phamchat = Calculator::getDiemPhamChat($value->_id, $thang_id);
                $donggop = Calculator::getDiemDongGop($value->_id, $thang_id);
                $value->chuyenmon = $chuyenmon["bancham"];
                $value->tiendo = $tiendo["bancham"];
                $value->donggop = $donggop["bancham"];
                $value->chatluong = $chatluong["bancham"];
                $value->kyluat = $kyluat["bancham"];
                $value->phamchat = $phamchat["bancham"];
                $value->tongdiem = $chuyenmon["bancham"] + $tiendo["bancham"] + $donggop["bancham"]
                    + $chatluong["bancham"] + $kyluat["bancham"] + $phamchat["bancham"];
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
            'page_size' => 15,
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
}