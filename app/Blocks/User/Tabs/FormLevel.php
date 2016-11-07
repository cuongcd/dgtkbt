<?php namespace App\Blocks\User\Tabs;

use App\Blocks\BaseForm;
use App\Helpers\Level;
use App\Helpers\Position;
use App\Helpers\Role;
use App\Helpers\Room;
use Lang;

class FormLevel extends BaseForm
{

    protected $key;

    protected function _addFields()
    {
        $data = $this->getData();

        $this->_addField('level_id', [
            'label' => 'Bậc Hiện Tại',
            'type' => 'select',
            'values' => Level::getListLevel(),
            'disabled' =>true,
        ]);
        $this->_addField('new_level_id', [
            'label' => 'Bậc Mới',
            'type' => 'select',
            'values' => Level::getListLevel(),
        ]);
        $this->_addField('chuyen_bac', [
            'name' => 'magento_btn_submit',
            'type' => 'buttons',
            'class' => 'btn btn-sm btn-primary',
            'label' => 'Chuyển Bậc',
            'values' => [
                'chuyen_bac' => [
                    'name' => 'share-alt-square',
                    'label' => 'Chuyển Bậc',
                ]
            ]
        ]);

        parent::_addFields();
    }
}

