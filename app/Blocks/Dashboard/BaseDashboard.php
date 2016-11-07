<?php

namespace App\Blocks\Dashboard;

class BaseDashboard{
    public $_all = null;
    public $_select = null;
    public $_settings = null;
    public $_title = null;
    public $_noRecordsText = 'No records found';

    public function __construct($all, $select, $settings, $title){
        $this->setChart($all);
        $this->setSelect($select);
        $this->setSettings($settings);
        $this->setTitle($title);
    }
    
    public function setChart($all){
        $this->_all = $all;
    }
    
    public function setSelect($select){
        $this->_select = $select;
    }
    
    public function setSettings($settings){
        $this->_settings = $settings;
    }
    
    public function setTitle($title){
        $this->_title = $title;
    }

}