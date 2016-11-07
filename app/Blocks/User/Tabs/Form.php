<?php namespace App\Blocks\User\Tabs;

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
//        $this->_addField('username', [
//            'label' => 'Tên Đăng Nhập',
//            'type' => 'text',
//            'required' => true,
//        ]);
        $this->_addField('email', [
            'label' => Lang::get('general.email'),
            'type' => 'text',
        ]);
        if (isset($data["_id"])) {
            $this->_addField('password', [
                'label' => Lang::get('general.password'),
                'type' => 'password',
            ]);
        } else {
            $this->_addField('password', [
                'label' => Lang::get('general.password'),
                'type' => 'password',
                'required' => true,
            ]);
        }

        $this->_addField('first_name', [
            'label' => 'Họ Tên',
            'type' => 'text',
        ]);
        $this->_addField('room_id', [
            'label' => 'Phòng',
            'type' => 'select',
            'values' => Room::getListRoom(),
            'required' => true,
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
            ]);
        } else {
            $this->_addField('chucdanh_id', [
                'label' => 'Chức Danh',
                'type' => 'select',
                "values" => [],
                'required' => true,
            ]);
        }
        $this->_addField('vaitro_id', [
            'label' => 'Vai Trò',
            'type' => 'select',
            'values' => Role::getListRoles(),
            'required' => true,
        ]);

        parent::_addFields();
    }
}

