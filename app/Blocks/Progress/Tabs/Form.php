<?php namespace App\Blocks\Progress\Tabs;

use App\Blocks\BaseForm;
use App\Helpers\Level;
use App\Helpers\Position;
use App\Helpers\Role;
use App\Helpers\Room;
use Lang;
use App\Helpers\ViTriLamViec;
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
        if (isset($data["_id"])) {
            $this->_addField('mission_id', [
                'type' => 'select',
                'label' => 'Vị Trí Làm Việc',
                'values' =>ViTriLamViec::ViTriLamViecByRoomId($data['room_id']),
            ]);
        } else {
            $this->_addField('mission_id', [
                'type' => 'select',
                'label' => 'Vị Trí Làm Việc',
                'values' => [],
            ]);
        }
        $this->_addField('name', [
            'label' => "Tên Tiến Độ",
            'type' => 'text',
            'required' => true,
        ]);
        $this->_addField('diemtru', [
            'label' => "Điểm Trừ",
            'type' => 'number',
            'min' => 0,
            'required' => true,
        ]);

        parent::_addFields();
    }
}

