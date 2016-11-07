<?php namespace App\Blocks\SelfRate;

use App\Blocks\BaseGrid;
use App\Helpers\Level;
use App\Helpers\Position;
use App\Helpers\Room;
use URL;
use Lang;

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
            ->_addColumn('username', [
                'label' => Lang::get('general.username'),
                'filter' =>false,
                'sort' => false,
            ])
            ->_addColumn('room_id', [
                'label' => 'Phòng',
                'type' =>'select',
                'filter' =>false,
                'options' => Room::getListRoom(),
                'sort' => false,

            ])
            ->_addColumn('level_id', [
                'label' => 'Bậc',
                'type' =>'select',
                'filter' =>false,
                'options' => Level::getListLevel(),
                'sort' => false,
            ])
            ->_addColumn('chucdanh_id', [
                'label' => 'Chức Danh',
                'type' =>'select',
                'filter' =>false,
                'options' => Position::getAllPositions(),
                 'sort' => false,
            ])
            ->_addColumn('tudanhgia', [
                'label' => 'Tự Đánh Giá',
                'type' =>'select',
                'filter' =>false,
                'options' => Position::getAllPositions(),
                'sort' => false,
            ])
            ->_addColumn('phongdanhgia', [
                'label' => 'Phòng Đánh Giá',
                'type' =>'select',
                'filter' =>false,
                'options' => Position::getAllPositions(),
                'sort' => false,
            ])
            ->_addColumn('bandanhgia', [
                'label' => 'Ban Đánh Giá',
                'type' =>'select',
                'filter' =>false,
                'options' => Position::getAllPositions(),
                'sort' => false,
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

    public function getRowUrl($row)
    {
        return URL::route('rates.edit', $row->_id);
    }
}