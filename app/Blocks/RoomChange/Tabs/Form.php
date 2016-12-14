<?php namespace App\Blocks\RoomChange\Tabs;

use App\Blocks\BaseForm;
use App\Helpers\Level;
use App\Helpers\Position;
use App\Helpers\Role;
use App\Helpers\Room;
use App\Helpers\ViTriLamViec;
use Lang;

class Form extends BaseForm
{

    protected $key;

    protected function _addFields()
    {
        $data = $this->getData();
        $this->_addField('_id', [
            'label' => 'id',
            'type' => 'hidden',
            'disabled' =>true,

        ]);
        $this->_addField('first_name', [
            'label' => 'Họ Tên',
            'type' => 'text',
            'disabled' =>true,

        ]);
        $this->_addField('room_id', [
            'label' => 'Phòng',
            'type' => 'select',
            'values' => Room::getListRoom(),
            'required' => true,
            'disabled' =>true,

        ]);
        if (isset($data["_id"])){
            $this->_addField('level_id', [
                'label' => 'Bậc',
                'type' => 'select',
                'values' => Level::getListLevel(),
                'disabled' =>true,
            ]);
        }else{
            $this->_addField('level_id', [
                'label' => 'Bậc',
                'type' => 'select',
                'values' => Level::getListLevel(),
                'required' => true,
            ]);
        }
        if (isset($data["_id"])) {
            $this->_addField('chucdanh_id', [
                'label' => 'Chức Danh',
                'type' => 'select',
                "values" => Position::getListPositions($data['room_id']),
                'required' => true,
                'disabled' =>true,

            ]);
        } else {
            $this->_addField('chucdanh_id', [
                'label' => 'Chức Danh',
                'type' => 'select',
                "values" => [],
                'required' => true,
                'disabled' =>true,
            ]);
        }

            $this->_addField('room_change', [
                'type' => 'multiselect',
                'class' => 'chosen-select',
                'label' => 'Vị Trí Làm Việc',
                'values' => Room::getListRoom(),
            ]);


        parent::_addFields();
    }
}

