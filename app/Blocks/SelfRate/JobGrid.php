<?php namespace App\Blocks\SelfRate;

use App\Blocks\BaseGrid;
use App\Helpers\Level;
use App\Helpers\Position;
use App\Helpers\Room;
use URL;
use Lang;

class JobGrid extends BaseGrid
{
    public function __construct($gridId, $resource, $collectionKey, $params = null, $toExport = false)
    {
        $this->setTitle(Lang::get(''));
        $this->setGridUrl(URL::to('self-rates/job'));
        $this->setAjaxGridUrl(URL::route('self_rates.job.grid'));
        parent::__construct($gridId, $resource, $collectionKey, $params, $toExport);
    }

    protected function _addButtons()
    {
    }

    protected function _addGridButtons()
    {
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
            ->_addColumn('_id', [
                'label' => 'ID',
                'filter' => false,
                'sort' => false,
                'width' => '10px'
            ])
            ->_addColumn('name', [
                'label' => 'Tên Công Việc',
                'filter' => false,
//                'sort' => false,
//                'editable' => true,
            ])
//            ->_addColumn('heso', [
//                'label' => 'Hệ Số',
//                'filter' => false,
//            ])
//            ->_addColumn('khoiluong', [
//                'label' => 'Khối Lượng',
//                'type' => 'number',
//                'filter' => false,
//                'editable' => true,
//                'min' => 0,
//                'sort' => false,
//                'width' => '10px'
//            ])
            ->_addColumn('khoiluong', [
                'label' => 'Khối Lượng',
                'type' => 'number',
                'filter' => false,
                'min' => 0,
//                'sort' => false,
                'width' => '10px'
            ])
            ->_addColumn('cv_tudanhgia', [
                'label' => 'Tự Chấm',
                'type' => 'number',
                'filter' => false,
                'editable' => true,
                'min' => 0,
                'sort' => false,
                'width' => '10px',
            ])
            ->_addColumn('cv_phongdanhgia', [
                'label' => 'Phòng Chấm',
                'type' => 'number',
                'filter' => false,
                'min' => 0,
                'sort' => false,
                'width' => '10px'
            ])
            ->_addColumn('cv_bandanhgia', [
                'label' => 'Ban Chấm',
                'type' => 'number',
                'filter' => false,
                'min' => 0,
                'sort' => false,
                'width' => '10px'
            ])
            ->_addColumn('ghichu', [
                'label' => 'Ghi Chú',
                'type' => 'text',
                'filter' => false,
                'sort' => false,
            ])
            ->_addColumn('action', [
                'label' => 'Edit',
                'type' => 'action',
                'align' => 'center',
                'width' => '10px',
                'links' => [
                    [
                        'route' => 'rates.edit',
                        'fields' => ['_id'],
                        'getters' => ['_id'],
                        'type' => 'edit',
                        'label' => 'Edit',
                        'options' => ['title' => 'Edit',
                            'onclick' => 'return false',
                            'name' => 'editChatLuong'],
                    ],
                ],
                'filter' => false,
                'sort' => false,
            ]);
    }

}