<?php

namespace App\Blocks\Log;

use App\Blocks\BaseTabs;
use App\Blocks\Log\Tabs\Form as LogForm;
use App\Helpers\Language;
use Lang;

class Tabs extends BaseTabs
{
    public function __construct($tabId)
    {

        $prefixRoute = 'logs';
        parent::__construct($tabId, $prefixRoute);
        $data = $this->getData();
        $title = isset($data['_id']) ? Lang::get('Log') . ' # ' . $data['_id'] . ' (' .
            Lang::get('general.id') . ': ' . $data['_id'] . ')' : Lang::get('New Location');
        $this->setTitle($title);
    }

    /*
    * Add tabs
    *
    * */
    protected function _addTabs()
    {
        $data = $this->getData();
//        $data =  json_decode(json_encode($data),true);
        $form = new LogForm($data,'Logs');
        $this->_addTab('form', [
            'label' => trans('general.information'),
            'content' => [
                'category_form' => [
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
        $this->_removeButton('save');
        $this->_removeButton('saveAndContinue');
    }
}