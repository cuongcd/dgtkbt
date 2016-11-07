<?php namespace App\Blocks\Level;

use App\Blocks\BaseGrid;
use URL;
use Lang;

class Grid extends BaseGrid
{
    public function __construct($gridId, $resource, $collectionKey, $params = null, $toExport = false)
    {
        $this->setTitle('Quản Lý Bậc');
        $this->setGridUrl(URL::to('levels/index'));
        $this->setAjaxGridUrl(URL::route('levels.grid'));
        parent::__construct($gridId, $resource, $collectionKey, $params, $toExport);
    }

    protected function _addButtons()
    {
        parent::_addButtons();
        $this->_addButton('add', [
            'url' => URL::route('levels.create'),
            'label' => Lang::get('general.add_new')
        ]);
    }

    protected function _addGridButtons()
    {
        $this->_addGridButton('download', [
            'url' => URL::route('levels.export', ['xlsx']),
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
                'url' => URL::route('levels.mass-delete'),
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
                'label' =>'Tên Bậc',
            ])
            ->_addColumn('description', [
                'label' => 'Mô Tả',
            ])
            ->_addColumn('created_at',[
                'label' => Lang::get('general.created_at')
            ])
            ->_addColumn('action', [
                'label' => Lang::get('general.action'),
                'type' => 'action',
                'align' => 'center',
                'links' => [
                    [
                        'route' => 'levels.edit',
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
        return URL::route('levels.edit', $row->_id);
    }
}