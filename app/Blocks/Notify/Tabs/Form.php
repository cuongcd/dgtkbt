<?php
namespace App\Blocks\Notify\Tabs;

use App\Blocks\BaseForm;
use DB;
use Session;
use App\Helpers\Permission;
class Form extends BaseForm
{
    protected $_key;

    public function __construct($data, $key)
    {
        $this->_key = $key;
        parent::__construct($data);
    }


    protected function _addFields()
    {
        $this->_addField('name', [
            'label' => 'Tiêu Đề',
            'type' => 'text',
            'required' => true,

        ]);

        $this->_addField('description', [
            'label' => 'Nội Dung',
            'type' => 'text',
            'required' => true,

        ]);
        $this->_addField('status', [
            'label' => 'Trạng Thái',
            'type' => 'select',
            'values' => [
                0=>'Ẩn',
                1=>'Hiện'
            ],
            'required' => true,
        ]);
        $this->_addField('seq_no', [
            'label' => 'Thứ Tự Hiển Thị',
            'type'  => 'number',
            'required' => true,
        ]);

        parent::_addFields();
    }

}