<?php
namespace App\Blocks\Permission;

use App\Blocks\BaseGrid;
use App\Models\Permission;
use URL;
use Lang;
use DB;
use Session;

class Grid extends BaseGrid
{
    public function __construct($gridId, $resource, $collectionKey, $params = null, $toExport = false)
    {
        $this->setTitle(Lang::get('pages.manage_permission'));
        $this->setGridUrl(URL::to('permissions/index'));
        $this->setAjaxGridUrl(URL::route('permissions.grid'));
        parent::__construct($gridId, $resource, $collectionKey, $params, $toExport);
    }


    public function getList()
    {
        $query = $this->getFilterParams();
        $model = DB::table('permission')
            ->where('permission.deleted_at', '=', null)
            ->select('*', 'permission._id');


        if (isset($query['filter'])) {
            foreach ($query['filter'] as $key => $val) {
                if (is_array($val)) {
                    if (isset($val['like'])) {
                        $model = $model->where($key, 'like', '%' . $val['like'] . '%');
                    }
                    if (isset($val['from'])) {
                        $model = $model->where('permission.' . $key, '>=', $val['from']);
                    }
                    if (isset($val['to'])) {
                        $model = $model->where('permission.' . $key, '<=', $val['to']);
                    }
                } else {
                    $model = $model->where($key, '=', $val);
                }
            }
        }

        if (isset($query['order']) && $query['order'] != 'seq_no') {
            if ($query['order'] == '_id' || $query['order'] == 'status')
                $model = $model->orderBy('permission.' . $query['order'], $query['dir']);
        }
        $offset = isset($query['page']) ? 10 * ($query['page'] - 1) : 0;
        $total = $model->count();
        $rows = $model->skip($offset)->take(10)->get();
        $ids = $model->lists('_id');

        return [
            'all_ids' => $ids,
            'items' => $rows,
            'total' => $total,
            'page_size' => 10,
            'from' => $offset,
        ];
    }

    protected function _addButtons()
    {
        parent::_addButtons();
        $this->_addButton('add', [
            'url' => URL::route('permissions.create'),
            'label' => Lang::get('general.add_new')
        ]);
    }

    protected function _addGridButtons()
    {
        $this->_addGridButton('download', [
            'url' => URL::route('permissions.export', ['xlsx']),
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
        $this->_addMassaction('delete', [
            'label' => Lang::get('general.delete'),
            'url' => URL::route('permissions.mass-delete'),
            'confirm' => Lang::get('general.are_you_sure'),
        ])
            ->_addMassaction('status', [
                'label' => Lang::get('general.change_status'),
                'url' => URL::route('permissions.mass-status'),
                'confirm' => Lang::get('general.are_you_sure'),
                'value' => [
                    'type' => 'select',
                    'label' => Lang::get('general.status'),
                    'options' => [
                        '1' => Lang::get('general.enabled'),
                        '2' => Lang::get('general.disabled'),
                    ]
                ]
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
                'label' => Lang::get('general.name'),
            ])
            ->_addColumn('description', [
                'label' => Lang::get('general.description'),
            ])
            ->_addColumn('status', [
                'type' => 'select',
                'label' => Lang::get('general.status'),
                'options' => [
                    '1' => Lang::get('general.enabled'),
                    '2' => Lang::get('general.disabled'),
                ],
            ])
            ->_addColumn('created_at', [
                'label' => Lang::get('general.created_at'),
                'type' => 'date',
                'format' => 'd/m/Y g:i A',
                'width' => '110px',
            ])
            ->_addColumn('action', [
                'label' => Lang::get('general.action'),
                'type' => 'action',
                'align' => 'center',
                'links' => [
                    [
                        'route' => 'permissions.edit',
                        'fields' => ['id'],
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
        return URL::route('permissions.edit', $row->_id);
    }
}