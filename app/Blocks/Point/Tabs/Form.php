<?php namespace App\Blocks\Point\Tabs;

use App\Blocks\BaseForm;
use App\Helpers\Room;
use Lang;

class Form extends BaseForm
{

    protected $key;

    protected function _addFields()
    {
        $data = $this->getData();
        $this->_addField('name', [
            'label' => 'Tên Xếp Loại',
            'type' => 'text',
            'required' => true,
        ]);
        $this->_addField('diem', [
            'label' => 'Điểm',
            'type' => 'number',
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