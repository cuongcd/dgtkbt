<?php

namespace App\Blocks\Notify\Tabs;

use App\Blocks\BaseForm;
use App\Helpers\Permission;
use DB;
use Session;

class GeneralForm extends BaseForm
{

	public function html($id = null)
	{
		return view('role.general', ['pages' => $this->_data, 'permissions' => Permission::getAllPermissions()]);
	}

}