<?php namespace App\Blocks\Role;

use App\Blocks\BaseGrid;
use URL;
use Lang;

class Grid extends BaseGrid
{
    public function __construct($gridId, $resource, $collectionKey, $params = null, $toExport = false)
    {
        $this->setTitle(Lang::get('general.manage_role'));
        $this->setGridUrl(URL::to('roles/index'));
        $this->setAjaxGridUrl(URL::route('roles.grid'));
        parent::__construct($gridId, $resource, $collectionKey, $params, $toExport);
    }

    protected function _addButtons()
    {
        parent::_addButtons();
        $this->_addButton('add', [
            'url' => URL::route('roles.create'),
            'label' => Lang::get('general.add_new')
        ]);
    }

    protected function _addGridButtons()
    {
        $this->_addGridButton('download', [
            'url' => URL::route('roles.export', ['xlsx']),
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
                'url' => URL::route('roles.mass-delete'),
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
                'label' => Lang::get('general.name'),
            ])
            ->_addColumn('description', [
                'label' => Lang::get('general.description'),
            ])
            ->_addColumn('created_at', [
                'label' => Lang::get('general.created_at'),
                'type' =>'date',
            ])
            ->_addColumn('updated_at', [
                'label' => Lang::get('general.updated_at'),
                'type' =>'date',
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

    public function getRowUrl($row)
    {
        return URL::route('roles.edit', $row->_id);
    }
}