<?php namespace App\Blocks\Notify;

use App\Blocks\BaseGrid;
use URL;
use Lang;

class Grid extends BaseGrid
{
    public function __construct($gridId, $resource, $collectionKey, $params = null, $toExport = false)
    {
        $this->setTitle(Lang::get('Quản Lý Thông Báo'));
        $this->setGridUrl(URL::to('notify/index'));
        $this->setAjaxGridUrl(URL::route('notify.grid'));
        parent::__construct($gridId, $resource, $collectionKey, $params, $toExport);
    }

    protected function _addButtons()
    {
        parent::_addButtons();
        $this->_addButton('add', [
            'url' => URL::route('notify.create'),
            'label' => Lang::get('general.add_new')
        ]);
    }

    protected function _addGridButtons()
    {
        $this->_addGridButton('download', [
            'url' => URL::route('notify.export', ['xlsx']),
            'label' => Lang::get('general.export_excel')
        ]);
        parent::_addGridButtons();
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
//                'url' => URL::route('roles.mass-delete'),
//                'confirm' => Lang::get('general.are_you_sure'),
//            ]);
    }

    protected function _addColumns()
    {
        $this
            ->_addColumn('name',[
                'label' =>'Tiêu Đề',
            ])
            ->_addColumn('description', [
                'label' => 'Nội Dung',
            ])
            ->_addColumn('created_at', [
                'label' => 'Ngày Tạo',
                'type' =>'date',
            ])
            ->_addColumn('status', [
                'label' => 'Trạng Thái',
                'type' =>'select',
                'options'=>[
                    0 => 'Ẩn',
                    1 =>'Hiện',
                ]
            ])
            ->_addColumn('seq_no',[
                'label' =>'Stt',
            ]);

    }

    public function getRowUrl($row)
    {
        return URL::route('notify.edit', $row->_id);
    }
}