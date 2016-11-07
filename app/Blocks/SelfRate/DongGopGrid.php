<?php namespace App\Blocks\SelfRate;

use App\Blocks\BaseGrid;
use App\Helpers\Level;
use App\Helpers\Position;
use App\Helpers\Room;
use URL;
use Lang;

class DongGopGrid extends BaseGrid
{
    public function __construct($gridId, $resource, $collectionKey, $params = null, $toExport = false)
    {
        $this->setTitle(Lang::get(''));
        $this->setGridUrl(URL::to('self-rates/donggop'));
        $this->setAjaxGridUrl(URL::route('self_rates.job.grid'));
        parent::__construct($gridId, $resource, $collectionKey, $params, $toExport);
    }

    protected function _addButtons()
    {
//
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
//                'type'=>"hidden",
            ])
            ->_addColumn('name', [
                'label' => 'Tên Đóng Góp',
                'filter' => false,
                'sort' => false,
//                'editable' => true,
            ])
            ->_addColumn('diemcong', [
                'label' => 'Điểm Cộng',
                'type' => 'number',
                'filter' => false,
                'sort' => false,
                'min' => 0,
            ])
            ->_addColumn('dg_tucong', [
                'label' => 'Tự Chấm',
                'type' => 'number',
                'filter' => false,
                'editable' => true,
                'min' => 0,
                'width' => '10px',
                'sort' => false,
            ])
            ->_addColumn('dg_phongcong', [
                'label' => 'Phòng Chấm',
                'type' => 'number',
                'filter' => false,
                'min' => 0,
                'width' => '10px',
                'sort' => false,
            ])
            ->_addColumn('dg_bancong', [
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
            ])->_addColumn('action', [
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
                        'label' =>'Edit',
                        'options' => ['title' => 'Edit',
                            'onclick' =>'return false',
                            'name' => 'editDongGop'],
                    ],
                ],
                'filter' => false,
                'sort' => false,
            ]);
    }

}