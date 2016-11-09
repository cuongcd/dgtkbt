<?php namespace App\Blocks\WorkMission\Tabs;

use App\Blocks\BaseForm;
use App\Helpers\Room;
use Lang;

class Form extends BaseForm
{

    protected $key;

    protected function _addFields()
    {
        $data = $this->getData();
        if(isset($data["_id"])) {
            $this->_addField('room_id', [
                'label' =>'Phòng',
                'type' => 'select',
                'disabled' =>true,
                'values' => Room::getListRoom(),
                'required' => true,
            ]);
        }
        else{
            $this->_addField('room_id', [
                'label' => 'Phòng',
                'type' => 'select',
                'values' =>  Room::getListRoom(),
                'required' => true,
            ]);
        }
        $this->_addField('name', [
            'label' => 'Tên Vị Trí công việc',
            'type' => 'text',
            'required' => true,
        ]);

        $this->_addField('description', [
            'label' => 'Mô Tả',
            'type' => 'text',
            'required' => true,
        ]);


        parent::_addFields();
    }
}