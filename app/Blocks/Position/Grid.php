<?php namespace App\Blocks\Position;

use App\Blocks\BaseGrid;
use App\Models\Room;
use URL;
use Lang;

class Grid extends BaseGrid
{
    public function __construct($gridId, $resource, $collectionKey, $params = null, $toExport = false)
    {
        $this->setTitle('Quản Lý Chức Danh');
        $this->setGridUrl(URL::to('positions/index'));
        $this->setAjaxGridUrl(URL::route('positions.grid'));
        parent::__construct($gridId, $resource, $collectionKey, $params, $toExport);
    }

    protected function _addButtons()
    {
        parent::_addButtons();
        $this->_addButton('add', [
            'url' => URL::route('positions.create'),
            'label' => Lang::get('general.add_new')
        ]);
    }

    protected function _addGridButtons()
    {
        $this->_addGridButton('download', [
            'url' => URL::route('positions.export', ['xlsx']),
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
        $this
            ->_addMassaction('delete', [
                'label' => Lang::get('general.delete'),
                'url' => URL::route('positions.mass-delete'),
                'confirm' => Lang::get('general.are_you_sure'),
            ]);
    }

    protected function _addColumns()
    {
        $this
            ->_addColumn('_id', [
                'type' => 'number',
                'min' => 1,
                'label' => Lang::get('general.id'),
                'width' => '80px',
                'align' => 'center',
            ])
            ->_addColumn('name', [
                'label' => 'Tên',
            ])
            ->_addColumn('description', [
                'label' =>'Mô Tả',
            ])
            ->_addColumn('room_id', [
                'type' =>'select',
                'options' => \App\Helpers\Room::getListRoom(),
                'label' => 'Phòng',
            ])
            ->_addColumn('created_at',[
                'label' => 'Ngày Tạo'
            ])
            ->_addColumn('action', [
                'label' => Lang::get('general.action'),
                'type' => 'action',
                'align' => 'center',
                'links' => [
                    [
                        'route' => 'positions.edit',
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

    public function getRowUrl($row)
    {
        return URL::route('positions.edit', $row->_id);
    }
    public function getList(){
        $class = $this->_resource;
        $query = $this->getFilterParams();
        $model = $class::where('_id', '<>', 0);
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

                    if (isset($val['to'])) {
                        $model = $model->where($key, '<=', $val['to']);
                    }

                } else {
                    $model = $model->where($key, '=', $val);
                }
            }
        }

        if (isset($query['order']) && $query['order'] != 'seq_no') {
            $model = $model->orderBy($query['order'], $query['dir']);
        }

        $offset = isset($query['page']) ? 10 * ($query['page'] - 1) : 0;
        $total = $model->count();
        $rows = $model->skip($offset)->take(10)->get();
        $ids = $model->lists('_id');

        return [
            'all_ids' => $ids,
            'items' => $rows->toArray(),
            'total' => $total,
            'page_size' => 10,
            'from' => $offset,
        ];
    }
}