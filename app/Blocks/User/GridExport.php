<?php namespace App\Blocks\User;

use App\Blocks\BaseGrid;
use App\Helpers\Level;
use App\Helpers\Position;
use App\Helpers\Room;
use URL;
use Lang;
use Illuminate\Pagination\Paginator;

class GridExport extends BaseGrid
{
    public function __construct($gridId, $resource, $collectionKey, $params = null, $toExport = false)
    {
        $this->setTitle('Quản Lý Nhân Viên');
        $this->setGridUrl(URL::to('users/index'));
        $this->setAjaxGridUrl(URL::route('users.grid'));
        parent::__construct($gridId, $resource, $collectionKey, $params, $toExport);
    }

    protected function _addButtons()
    {
        parent::_addButtons();
        $this->_addButton('add', [
            'url' => URL::route('users.create'),
            'label' => Lang::get('general.add_new')
        ]);
    }

    protected function _addGridButtons()
    {
        $this->_addGridButton('download', [
            'url' => URL::route('users.export', ['xlsx']),
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
                'url' => URL::route('users.mass-delete'),
                'confirm' => Lang::get('general.are_you_sure'),
            ]);
    }

    protected function _addColumns()
    {
        $this
            ->_addColumn('email', [
                'label' => 'email',
            ])
            ->_addColumn('first_name', [
                'label' => 'Họ Tên',
            ])
            ->_addColumn('room_id', [
                'label' => 'Phòng',
                'type' =>'select',
                'options' => Room::getListRoom(),

            ])
            ->_addColumn('level_id', [
                'label' => 'Bậc',
                'type' =>'select',
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
        $class = $this->_resource;
        $query = $this->getFilterParams();
        $model = $class::where('_id', '<>', 0);
//        if (isset($query['filter'])) {
//            foreach ($query['filter'] as $key => $val) {
//                if (is_array($val)) {
//                    if (isset($val['like'])) {
//                        $model = $model->where($key, 'like', '%' . $val['like'] . '%');
//                    }
//                    if (isset($val['from'])) {
//                        $model = $model->where($key, '>=', $val['from']);
//                    }
//                    if (isset($val['to'])) {
//                        $model = $model->where($key, '<=', $val['to']);
//                    }
//
//                    if (isset($val['to'])) {
//                        $model = $model->where($key, '<=', $val['to']);
//                    }
//
//                } else {
//                    $model = $model->where($key, '=', $val);
//                }
//            }
//        }
//
//        if (isset($query['order']) && $query['order'] != 'seq_no') {
//            $model = $model->orderBy($query['order'], $query['dir']);
//        }

        $offset = 0;
        $total = $model->count();;
        $rows = $model->skip($offset)->take(100)->get();
        $ids = $model->lists('_id');

        return [
            'all_ids' => $ids,
            'items' => $rows->toArray(),
            'total' => $total,
            'page_size' => 100,
            'from' => $offset,
        ];
    }
    public function setCollection()
    {
        $data = $this->getList();
        $this->_allIds = $data['all_ids'];
        $this->_itemTotal = $data['total'];
        $this->_limit = $data['total'];
        $this->_collection = $this->_toExport ? json_decode(json_encode($data['items'])) :
            new Paginator(json_decode(json_encode($data['items'])), $this->getLimit(), 1);
    }

    public function getRowUrl($row)
    {
        return URL::route('users.edit', $row->_id);
    }
}