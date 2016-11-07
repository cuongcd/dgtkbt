<?php namespace App\Blocks\Month\Tabs;

use App\Blocks\BaseForm;
use Lang;

class Form extends BaseForm
{

    protected $key;

    protected function _addFields()
    {
        $data = $this->getData();
        $this->_addField('name', [
            'label' => 'Tên Tháng',
            'type' => 'text',
            'required' => true,
            'disabled'  =>true,
        ]);

        $this->_addField('description', [
            'label' =>'Mô Tả',
            'type' => 'text',
            'required' => true,
        ]);
        $this->_addField('magento_synchronization_btn', [
            'name' => 'magento_btn_submit',
            'type' => 'buttons',
            'class' => 'btn btn-sm btn-primary',
            'label' => Lang::get('general.current_month'),
            'values' => [
                'magento_synchronization_btn' => [
                    'name' => 'share-alt-square',
                    'label' => Lang::get('general.current_month'),
                ]
            ]
        ]);

        parent::_addFields();
    }
}