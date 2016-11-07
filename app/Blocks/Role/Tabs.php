<?php namespace App\Blocks\Role;

use App\Blocks\BaseTabs;
use App\Blocks\Role\Tabs\Form;
use Lang;
use App\Blocks\Role\Tabs\GeneralForm;
use App\Helpers\Language;

class Tabs extends BaseTabs
{
    public function __construct($tabId)
    {
        $prefixRoute = 'roles';
        parent::__construct($tabId, $prefixRoute);
        $data = $this->getData();
        $title = $data['_id'] ? Lang::get('general.edit_role') . ' # ' . $data['_id'] : Lang::get('general.new_roles');
        $this->setTitle($title);
    }

    /*
    * Add tabs
    *
    */
    protected function _addTabs()
    {
        $data = $this->getData();

            $form = new Form($data, '');
            $this->_addTab('information_form' . '', [
                'label' =>  Lang::get('general.information'),
                'content' => [
                    'information_form' . '' => [
                        'title' => Lang::get('general.information'),
                        'content' => $form,
                        'width' => '12'
                    ]
                ]
            ]);
        $form = new GeneralForm($data);
        $this->_addTab('form', [
            'label' => trans('general.permission'),
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

