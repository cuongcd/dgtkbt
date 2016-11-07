<?php
namespace App\Blocks\Permission;

use App\Blocks\BaseTabs;
use App\Blocks\Permission\Tabs\GeneralForm;
use App\Helpers\Language;
use Lang;
use App\Blocks\Permission\Tabs\Form;
use Config;

class Tabs extends BaseTabs
{
    public function __construct($tabId)
    {
        $prefixRoute = 'permissions';
        parent::__construct($tabId, $prefixRoute);
        $data = $this->getData();
        $title = $data['_id'] ? Lang::get('pages.edit_permissions') . ' # ' . $data['_id'] : Lang::get('pages.new_permissions');
        $this->setTitle($title);
    }

    /*
    * Add tabs
    *
    */
    protected function _addTabs()
    {
        $data = $this->getData();
        $form = new Form($data);
        $this->_addTab('form', [
            'label' => trans('general.general_information'),
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
    */
    protected function _addButtons()
    {
        parent::_addButtons();
        $this->_removeButton('duplicate');
    }
}