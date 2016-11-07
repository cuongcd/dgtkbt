<?php namespace App\Blocks\SelfRate;

use App\Blocks\BaseGrid;
use App\Helpers\Level;
use App\Helpers\Position;
use App\Helpers\Room;
use URL;
use Lang;

class KyLuatGrid extends BaseGrid
{
    public function __construct($gridId, $resource, $collectionKey, $params = null, $toExport = false)
    {
        $this->setTitle(Lang::get(''));
        $this->setGridUrl(URL::to('self-rates/kyluat'));
        $this->setAjaxGridUrl(URL::route('self_rates.kyluat.grid'));
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
//                'type'=>"hidden",
            ])
            ->_addColumn('name', [
                'label' => 'Tên kỷ Luật',
                'filter' => false,
                'sort' => false,
//                'editable' => true,
            ])
            ->_addColumn('diemtru', [
                'label' => 'Điểm Trừ',
                'type' => 'number',
                'filter' => false,
                'sort' => false,
                'min' => 0,
                'width' => '10px'
            ])
            ->_addColumn('kl_tutru', [
                'label' => 'Tự Chấm',
                'type' => 'number',
                'filter' => false,
                'editable' => true,
                'sort' => false,
                'min' => 0,
                'width' => '10px'
            ])
            ->_addColumn('kl_phongtru', [
                'label' => 'Phòng Chấm',
                'type' => 'number',
                'filter' => false,
                'min' => 0,
                'sort' => false,
                'width' => '10px'
            ])
            ->_addColumn('kl_bantru', [
                'label' => 'Ban Chấm',
                'type' => 'number',
                'filter' => false,
                'min' => 0,
                'sort' => false,
                'width' => '10px'
            ])
            ->_addColumn('ghichu', [
                'label' =>'Ghi Chú',
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
                            'name' => 'editKyLuat'],
                    ],
                ],
                'filter' => false,
                'sort' => false,
            ]);
    }

}