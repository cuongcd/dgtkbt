<?php namespace App\Blocks\Room\Tabs;

use App\Blocks\BaseForm;
use Lang;

class Form extends BaseForm
{

    protected $key;

    protected function _addFields()
    {
        $data = $this->getData();
        $this->_addField('name', [
            'label' => 'Tên Phòng',
            'type' => 'text',
            'required' => true,
        ]);

        $this->_addField('description', [
            'label' => 'Mô Tả',
            'type' => 'text',
            'required' => true,
        ]);

        $this->_addField('seq_no', [
            'label' => 'Thứ Tự',
            'type' => 'number',
//            'required' => true,
        ]);
//        $this->_addField('status', [
//            'label' => Lang::get('general.status'),
//            'type' => 'select',
//            'required' => true,
//            'values' =>[
//                '1' => Lang::get('general.enable'),
//                '2' => Lang::get('general.disabled'),
//            ]
//        ]);

        parent::_addFields();
    }
}