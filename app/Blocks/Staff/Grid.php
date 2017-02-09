<?php namespace App\Blocks\Staff;

use App\Blocks\BaseGrid;
use App\Helpers\GiaoViec;
use App\Helpers\Level;
use App\Helpers\Position;
use App\Helpers\Room;
use URL;
use Lang;
use Session;
class Grid extends BaseGrid
{
    public function __construct($gridId, $resource, $collectionKey, $params = null, $toExport = false)
    {
        $this->setTitle(Lang::get(''));
        $this->setGridUrl(URL::to('staffs/index'));
        $this->setAjaxGridUrl(URL::route('staffs.grid'));
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
            ->_addColumn('first_name', [
                'label' => 'Họ Tên',
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
                'sort' => false,
                'options' => Position::getAllPositions()
            ])
            ->_addColumn('is_giaoviec', [
                'label' => 'Đã Giao Việc',
                'type' =>'select',
                'filter' =>false,
                'sort' => false,
                'options' => [
                    '0' => 'Chưa Giao',
                    '1' => 'Đã Giao'
                ]
            ])

            ->_addColumn('action', [
                'label' =>'Giao Việc',
                'type' => 'action',
                'align' => 'center',
                'sort' => false,
                'links' => [
                    [
                        'route' => 'staffs.edit',
                        'fields' => ['_id'],
                        'getters' => ['_id'],
                        'type' => 'edit',
                        'label' =>'Giao Việc',
                        'options' => ['title' => 'Giao Việc'],
                    ],
                ],
                'filter' => false,
                'sort' => false,
            ]);
    }

    public function getRowUrl($row)
    {
        $url = URL::route('staffs.edit', $row->_id);
        $date_param = Session::get('param_date');
        if(strlen($date_param) > 3) {
            $url = $url .'?date_param=' . $date_param . '&room_id=' .$row->room_id ;
        }

        return $url;
    }
    public function getList()
    {
        $class = $this->_resource;
        $query = $this->getFilterParams();
        if(isset($query['filter']['thang_id']))
            $thang_id = $query['filter']['thang_id'];
        unset($query['filter']['thang_id']);
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

        $query['order'] = 'seq_no' ;
        $query['dir'] = 'ASC';
        $model = $model->orderBy($query['order'], $query['dir']);

//        if (isset($query['order']) && $query['order'] != 'seq_no') {
//            $model = $model->orderBy($query['order'], $query['dir']);
//        }

        $offset = isset($query['page']) ? 20 * ($query['page'] - 1) : 0;
        $total = $model->count();
        $rows = $model->skip($offset)->take(20)->get();
        $ids = $model->lists('_id');
        if(isset($thang_id)){
            foreach($rows as$key => $value){
                $value['is_giaoviec'] = GiaoViec::isGiaoViec($value->_id,$thang_id);
                $rows[$key] = $value;
            }
        }
        return [
            'all_ids' => $ids,
            'items' => $rows->toArray(),
            'total' => $total,
            'page_size' => 20,
            'from' => $offset,
        ];
    }
}