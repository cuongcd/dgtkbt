<?php namespace App\Blocks\Progress;

use App\Blocks\BaseTabs;
use App\Blocks\Progress\Tabs\Form as UserForm;
use URL;
use Lang;
class Tabs extends BaseTabs
{
    public function __construct($tabId)
    {
        $prefixRoute = 'progress';
        parent::__construct($tabId, $prefixRoute);
        $data = $this->getData();
        $title = $data['_id'] ? 'Tiến Độ Công Việc # ' . $data['_id'] : "Tiến Độ Công Việc";
        $this->setTitle($title);
        $this->setJs('inventory/users.js', [
            'url' => URL::route("positions.getlist"),
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
            'label' => 'Tiến Độ Công Việc',
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
        $data = $this->getData();
        if ($this->getDataId() && isset($data['status']) && $data['status'] == 1) {
            $this->_addButton('delete', [
                    'label' => Lang::get('general.delete'),
                    'url' => URL::route('progress.delete', array($this->getDataId())),
                    'sort' => 50
                ]
            );
        }
    }
}

