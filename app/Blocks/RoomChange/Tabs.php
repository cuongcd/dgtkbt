<?php namespace App\Blocks\RoomChange;

use App\Blocks\BaseTabs;
use App\Blocks\RoomChange\Tabs\Form as UserForm;
use App\Blocks\RoomChange\Tabs\FormLevel;
use URL;
use Lang;
use App\Blocks\RoomChange\Tabs\GeneralForm;
class Tabs extends BaseTabs
{
    public function __construct($tabId)
    {
        $prefixRoute = 'roomcharges';
        parent::__construct($tabId, $prefixRoute);
        $data = $this->getData();
        $title = $data['_id'] ? 'Phó Ban Phụ Trách Phòng ' . ' # ' . $data['first_name'] : 'Thêm Nhân Viên';
        $this->setTitle($title);
        $this->setJs('inventory/users.js', [
            'url' => URL::route("positions.getlist"),
            'changeUrl' => URL::route("users.changer_level"),
            'missition_url' => URL::route("missions.getlist"),
        ]);
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
            'label' => Lang::get('general.user'),
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
    }
}

