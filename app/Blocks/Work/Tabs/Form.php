<?php namespace App\Blocks\Work\Tabs;

use App\Blocks\BaseForm;
use App\Helpers\Level;
use App\Helpers\Position;
use App\Helpers\Role;
use App\Helpers\Room;
use Lang;

class Form extends BaseForm
{

    protected $key;

    protected function _addFields()
    {
        $data = $this->getData();

        $this->_addField('room_id', [
            'label' => 'Chọn Phòng',
            'type' => 'select',
            'values' => Room::getListRoom(),
            'required' => true,
        ]);
        $this->_addField('level_id', [
            'label' => 'Chọn Bậc',
            'type' => 'select',
            'values' => Level::getListLevel(),
            'required' => true,
        ]);
        if(isset($data["_id"])) {
            $this->_addField('chucdanh_id', [
                'label' => 'Chọn Chức Danh',
                'type' => 'select',
                "values" => Position::getListPositions($data['room_id']),
                'required' => true,
            ]);
        }
        else{
            $this->_addField('chucdanh_id', [
                'label' => 'Chọn Chức Danh',
                'type' => 'select',
                "values" => [],
                'required' => true,
            ]);
        }
        $this->_addField('name', [
            'label' => "Tên Công Việc Chuyên Môn",
            'type' => 'text',
            'required' => true,
        ]);
        $this->_addField('heso', [
            'label' => "Hệ Số",
            'type' => 'number',
            'min' => 0,
            'required' => true,
        ]);
        $this->_addField('macdinh', [
            'label' => "Khối Lượng Mặc Định",
            'type' => 'number',
            'min' => 0,
            'required' => true,
        ]);

        parent::_addFields();
    }
}

