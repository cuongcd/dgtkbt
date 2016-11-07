<?php namespace App\Blocks\Job;

use App\Blocks\BaseGrid;
use App\Helpers\Level;
use App\Helpers\Position;
use App\Helpers\Room;
use URL;
use Lang;

class JobGrid extends BaseGrid
{
    public function __construct($gridId, $resource, $collectionKey, $params = null, $toExport = false)
    {
        $this->setTitle(Lang::get(''));
        $this->setGridUrl(URL::to('job/job'));
        $this->setAjaxGridUrl(URL::route('job.grid'));
        parent::__construct($gridId, $resource, $collectionKey, $params, $toExport);
    }

    protected function _addButtons()
    {
    }

    protected function _addGridButtons()
    {
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
            ->_addColumn('_id', [
                'label' => 'ID',
                'filter' => false,
                'sort' =>false,
                'width' =>'10px',
                'type' =>'hidden'
            ])
            ->_addColumn('name', [
                'label' => 'Tên Công Việc',
                'filter' => false,
                'sort' =>false,

//                'editable' => true,
            ])
            ->_addColumn('heso', [
                'label' => 'Hệ Số',
                'filter' => false,
                'sort' =>false,
                'width' =>'10px'
            ])
            ->_addColumn('macdinh', [
                'label' => 'Mặc Định',
                'type' => 'number',
                'filter' => false,
                'min' => 0,
                'sort' =>false,
                'width' =>'10px'
            ])
            ->_addColumn('khoiluong', [
                'label' => 'Khối Lượng',
                'type' => 'number',
                'filter' => false,
                'min' => 0,
                'sort' =>false,
                'width' =>'10px'
            ])
            ->_addColumn('nguoigiao',[
                'label' => 'Người Giao',
                'type' => 'text',
                'filter' => false,
                'sort' =>false,
            ])
            ->_addColumn('ghichu', [
                'label' => 'Ghi Chú',
                'type' => 'text',
                'filter' => false,
                'sort' =>false,
            ]);
    }

}