<?php namespace App\Blocks\Log;

use App\Blocks\BaseGrid;
use URL;
use Lang;
use DB;
use Session;

class Grid extends BaseGrid
{
    public function __construct($gridId, $resource, $collectionKey, $params = null, $toExport = false)
    {
        $this->setTitle(Lang::get('Manager Logs'));
        $this->setGridUrl(URL::to('logs/index'));
        $this->setAjaxGridUrl(URL::route('logs.grid'));
        $this->setJs('inventory/product-grid-jquery.js',['import_exec' => URL::route('logs.import')]);
        parent::__construct($gridId, $resource, $collectionKey, $params, $toExport);
    }

    /**
     * get list object and query filter
     * @return array
     */
    public function getList()
    {
        $query = $this->getFilterParams();
        $model = DB::table('log')
            ->where('log.deleted_at', '=', null)
            ->select('*', 'log._id');
        if (isset($query['filter'])) {
            foreach ($query['filter'] as $key => $val) {
                if (is_array($val)) {
                    if (isset($val['like'])) {
                        $model = $model->where($key, 'like', '%' . $val['like'] . '%');
                    }
                    if (isset($val['from'])) {
                        $model = $model->where('file.' . $key, '>=', $val['from']);
                    }
                    if (isset($val['to'])) {
                        $model = $model->where('file.' . $key, '<=', $val['to']);
                    }
                } else {
                    $model = $model->where($key, '=', $val);
                }
            }
        }

        if (isset($query['order'])) {
            if ($query['order'] == '_id' || $query['order'] == 'status')
                $model = $model->orderBy('log.' . $query['order'], $query['dir']);
            else
                $model = $model->orderBy('log.' . $query['order'], $query['dir']);
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

    // protected function _addButtons()
    // {
    //     parent::_addButtons();
    //     $this->_addButton('add', [
    //         'url' => URL::route('contacts.create'),
    //         'label' => 'Add New'
    //     ]);
    // }

    protected function _addGridButtons()
    {
        $this->_addGridButton('import', [
            'label' => trans('general.import_csv'),
            'type' => 'upload'
        ]);
//        $this->_addGridButton('download', [
//            'url' => URL::route('images.export', ['xlsx']),
//            'label' => Lang::get('general.export_excel')
//        ]);
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
                'url' => URL::route('logs.mass-delete'),
                'confirm' => Lang::get('general.are_you_sure'),
            ]);
    }

    protected function _addColumns()
    {
        $this
//            ->_addColumn('_id', [
//                'type' => 'number',
//                'min' => 1,
//                'label' => Lang::get('general.id'),
//                'width' => '80px',
//                'align' => 'center',
//            ])
            ->_addColumn('ip', [
                'label' => Lang::get('general.ip'),
               
            ])
          
            ->_addColumn('mac', [
                'label' => Lang::get('general.mac'),
            ])
//            ->_addColumn('app_version_name', [
//                'label' => Lang::get('general.version_name'),
//            ])
            ->_addColumn('app_version_code', [
                'label' => Lang::get('general.version_code'),
            ])
            ->_addColumn('language', [
                'label' => Lang::get('general.language'),
            ])
//            ->_addColumn('db_version', [
//                'label' => Lang::get('general.db_version'),
//            ])
            ->_addColumn('song_id', [
                'label' => Lang::get('general.song_id'),
            ])
            ->_addColumn('action_type', [
                'label' => Lang::get('general.action_type'),
            ])
            ->_addColumn('action', [
                'label' => Lang::get('general.action'),
                'type' => 'action',
                'align' => 'center',
                'links' => [
                    [
                        'route' => 'logs.edit',
                        'fields' => ['_id'],
                        'getters' => ['_id'],
                        'type' => 'edit',
                        'label' => Lang::get('general.edit'),
                        'options' => ['title' => Lang::get('general.edit')],
                    ],
                ],
                'filter' => false,
                'sort' => false,
            ]
            );
    }
     public function getRowUrl($row)
    {
        return URL::route('logs.edit', $row->_id);
    }

}