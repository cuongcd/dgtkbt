<?php

namespace App\Blocks\Log\Tabs;

use App\Blocks\BaseForm;
use Lang;

class Form extends BaseForm
{
    /*
     * Add filed to form
     */


    protected function _addFields()
    {
        $this->_addField('agent', [
            'label' => Lang::get('general.agent'),
            'type' => 'text',
            'disabled' =>true,
        ]);
        $this->_addField('mac', [
            'label' => Lang::get('general.mac'),
            'type' => 'text',
            'disabled' =>true,
        ]);

        $this->_addField('ip', [
            'label' => Lang::get('general.ip'),
            'type' => 'text',
            'disabled' =>true,
        ]);
        $this->_addField('app_version_code', [
            'label' => Lang::get('general.version_code'),
            'type' => 'text',
            'disabled' =>true,
        ]);
        $this->_addField('app_version_name', [
            'label' => Lang::get('general.version_name'),
            'type' => 'text',
            'disabled' =>true,
        ]);
        $this->_addField('language', [
            'label' => Lang::get('general.language'),
            'type' => 'text',
            'disabled' =>true,
        ]);
        $this->_addField('db_version', [
            'label' => Lang::get('general.db_version'),
            'type' => 'text',
            'disabled' =>true,
        ]);
        $this->_addField('song_id', [
            'label' => Lang::get('general.song_id'),
            'type' => 'text',
            'disabled' =>true,
        ]);
        $this->_addField('action_type', [
            'label' => Lang::get('general.action_type'),
            'type' => 'text',
            'disabled' =>true,
        ]);
        $this->_addField('action_value', [
            'label' => Lang::get('general.action_value'),
            'type' => 'text',
            'disabled' =>true,
        ]);
        $this->_addField('created_at', [
            'label' => Lang::get('general.created_at'),
            'type' => 'date',
            'disabled' =>true,
        ]);

        parent::_addFields();
    }

}