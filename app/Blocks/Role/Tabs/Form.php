<?php
namespace App\Blocks\Role\Tabs;

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


    public function html($id = null)
    {
        return view('role.index', ['roles' => $this->_data, 'lang' => $this->_key, 'permissions' => Permission::getAllPermissions()]);
    }

}