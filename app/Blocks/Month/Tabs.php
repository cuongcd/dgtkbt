<?php namespace App\Blocks\Month;

use App\Blocks\BaseTabs;
use App\Blocks\Month\Tabs\Form as UserForm;
use URL;
use Lang;
class Tabs extends BaseTabs
{
    public function __construct($tabId)
    {
        $prefixRoute = 'months';
        parent::__construct($tabId, $prefixRoute);
        $data = $this->getData();
        $title = $data['_id'] ?'Tháng' . ' # ' . $data['name'] : 'Thêm Tháng';
        $this->setTitle($title);
        $this->setJs('inventory/month.js',[]);
    }

    /*
    * Add tabs
    *
    * */
    protected function _addTabs()
    {
        $data = $this->getData();
        $form = new UserForm($data);
        $this->_addTab('form', [
            'label' => 'Tháng',
            'content' => [
                'information_form' => [
                    'title' => Lang::get('general.information'),
                    'content' => $form,
                    'width' => '12',
                    'collapse' => true,
                ]
            ]
        ]);
    }

    /*
    * Add buttons
    *
    * */
    protected function _addButtons()
    {
        parent::_addButtons();
        $this->_removeButton('duplicate');
        $this->_removeButton('delete');
        $data = $this->getData();
//        if ($this->getDataId() && isset($data['status']) && $data['status'] == 1) {
//            $this->_addButton('delete', [
//                    'label' => Lang::get('general.delete'),
//                    'url' => URL::route('months.delete', array($this->getDataId())),
//                    'sort' => 50
//                ]
//            );
//        }
    }
}

