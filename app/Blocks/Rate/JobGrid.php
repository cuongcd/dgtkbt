<?php namespace App\Blocks\Rate;

use App\Blocks\BaseGrid;
use App\Helpers\Level;
use App\Helpers\Position;
use App\Helpers\Room;
use App\Helpers\VaiTro;
use URL;
use Lang;

class JobGrid extends BaseGrid
{
    public function __construct($gridId, $resource, $collectionKey, $params = null, $toExport = false)
    {
        $this->setTitle(Lang::get(''));
        $this->setGridUrl(URL::to('rates/job'));
        $this->setAjaxGridUrl(URL::route('rates.job.grid'));
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
            ->_addColumn('_id', [
                'label' => 'ID',
                'filter' => false,
                'width' => '10px',
//                'type'=>"hidden",
            ])
            ->_addColumn('name', [
                'label' => 'Tên Công Việc',
                'filter' => false,
//                'editable' => true,
            ])
            ->_addColumn('khoiluong', [
                'label' => 'Khối Lượng',
                'type' => 'number',
                'filter' => false,
                'editable' => true,
                'min' => 0,
                'width' => '10px',
            ])
            ->_addColumn('khoiluong', [
                'label' => 'Khối Lượng',
                'type' => 'number',
                'filter' => false,
                'width' => '10px',
                'min' => 0,
            ])
            ->_addColumn('cv_tudanhgia', [
                'label' => 'Tự Chấm',
                'type' => 'number',
                'filter' => false,
                'min' => 0,
                'width' => '10px',
            ])
            ->_addColumn('cv_phongdanhgia', [
                'label' => 'Phòng Chấm',
                'type' => 'number',
                'filter' => false,
                'editable' => VaiTro::getEditPhong(),
                'min' => 0,
                'width' => '10px',
            ])
            ->_addColumn('cv_bandanhgia', [
                'label' => 'Ban Chấm',
                'type' => 'number',
                'filter' => false,
                'min' => 0,
                'width' => '10px',
                'editable' => VaiTro::getEditBan(),
            ])
            ->_addColumn('ghichu', [
                'label' => 'Ghi Chú',
                'type' => 'text',
                'filter' => false,
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
                            'name' => 'editCongViec'],
                    ],
                ],
                'filter' => false,
                'sort' => false,
            ]);
    }

}