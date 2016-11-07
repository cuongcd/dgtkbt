<?php namespace App\Blocks\User;

use App\Blocks\BaseTabs;
use App\Blocks\User\Tabs\Form as UserForm;
use App\Blocks\User\Tabs\FormLevel;
use URL;
use Lang;
use App\Blocks\User\Tabs\GeneralForm;
class Tabs extends BaseTabs
{
    public function __construct($tabId)
    {
        $prefixRoute = 'users';
        parent::__construct($tabId, $prefixRoute);
        $data = $this->getData();
        $title = $data['_id'] ? 'Nhân Viên' . ' # ' . $data['first_name'] : 'Thêm Nhân Viên';
        $this->setTitle($title);
        $this->setJs('inventory/users.js', [
            'url' => URL::route("positions.getlist"),
            'changeUrl' =>URL::route("users.changer_level"),
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
        if(isset($data["_id"])){
            $form = new FormLevel($data);
            $this->_addTab('level', [
                'label' => 'Chuyển Bậc',
                'content' => [
                    'form' => [
                        'title' => Lang::get('general.information'),
                        'content' => $form,
                        'width' => '12'
                    ]
                ]
            ]);
        }
        $form = new GeneralForm($data);
        $this->_addTab('role', [
            'label' => trans('general.information'),
            'content' => [
                'form' => [
                    'title' => Lang::get('general.information'),
                    'content' => $form,
                    'width' => '12'
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
        $data = $this->getData();
        if ($this->getDataId() && isset($data['status']) && $data['status'] == 1) {
            $this->_addButton('delete', [
                    'label' => Lang::get('general.delete'),
                    'url' => URL::route('users.delete', array($this->getDataId())),
                    'sort' => 50
                ]
            );
        }
    }
}

