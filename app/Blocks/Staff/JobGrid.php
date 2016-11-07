<?php namespace App\Blocks\Staff;

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
        $this->setGridUrl(URL::to('staffs/index'));
        $this->setAjaxGridUrl(URL::route('staffs.job.grid'));
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
//                'url' => URL::route('staffs.mass-delete'),
//                'confirm' => Lang::get('general.are_you_sure'),
//            ]);
    }

    protected function _addColumns()
    {
        $this
            ->_addColumn('_id', [
                'label' => 'ID',
                'filter' => false,
                'width' => '10px'
//                'type'=>"hidden",
            ])
            ->_addColumn('name', [
                'label' => 'Tên Công Việc',
                'filter' => false,
//                'editable' => true,
            ])
            ->_addColumn('heso', [
                'label' => 'Hệ Số',
                'filter' => false,
                'width' => '10px'
            ])
            ->_addColumn('macdinh', [
                'label' => 'Mặc Định',
                'type' => 'number',
                'filter' => false,
                'width' => '10px'
            ])
            ->_addColumn('khoiluong', [
                'label' => 'Khối Lượng',
                'type' => 'number',
                'filter' => false,
                'editable' => true,
                'min' => 0,
                'width' => '10px'
            ])
            ->_addColumn('nguoigiao', [
                'label' => 'Người Giao',
                'min' => 0,
                'filter' => false,
                'width' => '30px'
            ])
        ->
        _addColumn('action', [
            'label' => 'Xóa/Edit',
            'type' => 'action',
            'align' => 'center',
            'links' => [
                [
                    'route' => 'staffs.edit',
                    'fields' => ['_id'],
                    'getters' => ['_id'],
                    'label' => 'Giao Việc',
                    "type" =>"fa fa-times",
                    'options' => ['title' => 'Giao Việc',
                        "name" =>'delete_CV',
                    'onclick' =>'return false',]

                ],
                [
                'route' => 'staffs.edit',
                'fields' => ['_id'],
                'getters' => ['_id'],
                'label' => 'Giao Việc',
                "type" =>"edit",
                'options' => ['title' => 'Giao Việc',
                    "name" =>'Edit_CV',
                    'onclick' =>'return false',]

            ],
            ],
            'width' => '10px',
            'filter' => false,
            'sort' => false,
        ]);
    }

}