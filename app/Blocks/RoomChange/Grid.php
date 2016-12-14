<?php namespace App\Blocks\RoomChange;

use App\Blocks\BaseGrid;
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
        $this->setTitle('Phó Ban Phụ Trách Phòng');
        $this->setGridUrl(URL::to('users/index'));
        $this->setAjaxGridUrl(URL::route('users.grid'));
        parent::__construct($gridId, $resource, $collectionKey, $params, $toExport);

    }

    protected function _addButtons()
    {
        parent::_addButtons();
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

    }

    protected function _addColumns()
    {
        $this

            ->_addColumn('first_name', [
                'label' => 'Họ Tên',
                'filter' =>false,
            ])
            ->_addColumn('room_id', [
                'label' => 'Phòng',
                'type' =>'select',
                'filter' =>false,
                'options' => Room::getListRoom(),

            ])
            ->_addColumn('level_id', [
                'label' => 'Bậc',
                'type' =>'select',
                'filter' =>false,
                'options' => Level::getListLevel(),
            ])
            ->_addColumn('chucdanh_id', [
                'label' => 'Chức Danh',
                'type' =>'select',
                'filter' =>false,
                'options' => Position::getAllPositions()
            ])

            ->_addColumn('action', [
                'label' => Lang::get('general.action'),
                'type' => 'action',
                'align' => 'center',
                'links' => [
                    [
                        'route' => 'users.edit',
                        'fields' => ['_id'],
                        'getters' => ['_id'],
                        'type' => 'edit',
                        'label' => Lang::get('general.edit'),
                        'options' => ['title' => Lang::get('general.edit')],
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
            ->where('users.vaitro_id', '=', 4)
            ->where('users.deleted_at', '=', null)
            ->select('*', 'users._id');


        $offset = isset($query['page']) ? 20 * ($query['page'] - 1) : 0;
        $total = $model->count();
        $rows = $model->skip($offset)->take(20)->get();
        $ids = $model->lists('_id');
        return [
            'all_ids' => $ids,
            'items' => $rows,
            'total' => $total,
            'page_size' => 20,
            'from' => $offset,
        ];
    }

    public function getRowUrl($row)
    {
        return URL::route('roomcharges.edit', $row->_id);
    }
}