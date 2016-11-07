<?php namespace App\Blocks\Rate;

use App\Blocks\BaseGrid;
use App\Helpers\Level;
use App\Helpers\Position;
use App\Helpers\Room;
use App\Helpers\VaiTro;
use URL;
use Lang;

class TienDoGrid extends BaseGrid
{
    public function __construct($gridId, $resource, $collectionKey, $params = null, $toExport = false)
    {
        $this->setTitle(Lang::get(''));
        $this->setGridUrl(URL::to('rates/tiendo'));
        $this->setAjaxGridUrl(URL::route('rates.tiendo.grid'));
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
//
    }

    protected function _addColumns()
    {
        $this
            ->_addColumn('_id', [
                'label' => 'ID',
                'filter' => false,
                'width' => '10px',
                'sort' => false,
//                'type'=>"hidden",
            ])
            ->_addColumn('name', [
                'label' => 'Tên Tiến Độ',
                'filter' => false,
                'sort' => false,
//                'editable' => true,
            ])
            ->_addColumn('diemtru', [
                'label' => 'Điểm Trừ',
                'type' => 'number',
                'filter' => false,
                'width' => '10px',
                'min' => 0,
                'sort' => false,
            ])
            ->_addColumn('td_tutru', [
                'label' => 'Tự Chấm',
                'type' => 'number',
                'filter' => false,
                'min' => 0,
                'width' => '10px',
                'sort' => false,
            ])
            ->_addColumn('td_phongtru', [
                'label' => 'Phòng Chấm',
                'type' => 'number',
                'filter' => false,
                'editable' => VaiTro::getEditPhong(),
                'min' => 0,
                'width' => '10px',
                'sort' => false,
            ])
            ->_addColumn('td_bantru', [
                'label' => 'Ban Chấm',
                'type' => 'number',
                'filter' => false,
                'min' => 0,
                'width' => '10px',
                'editable' => VaiTro::getEditBan(),
                'sort' => false,
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
                        'label' =>'Edit',
                        'options' => ['title' => 'Edit',
                            'onclick' =>'return false',
                            'name' => 'editTienDo'],
                    ],
                ],
                'filter' => false,
                'sort' => false,
            ]);
    }

}