<?php

namespace App\Blocks\User\Tabs;

use App\Blocks\BaseForm;
use App\Helpers\Role;
use DB;
use Session;
use Lang;
class GeneralForm extends BaseForm
{

	protected function _addFields()
	{
		$data = $this->getData();
		$this->_addField('phone', [
			'label' => 'Điện Thoại',
			'type' => 'text',
		]);

		$this->_addField('address', [
			'label' => 'Địa Chỉ',
			'type' => 'text',
		]);
		parent::_addFields();
	}

}