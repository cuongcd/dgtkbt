<?php
namespace App\Blocks\Permission\Tabs;

use App\Blocks\BaseForm;
use DB;
use Session;
use Lang;

class Form extends BaseForm
{
	protected $_key;

	protected function _addFields()
	{

		$data = $this->getData();
		$this->_addField('name', [
			'label' => Lang::get('general.name'),
			'type' => 'text',
			'required' => true,
		]);

		$this->_addField('description', [
			'label' => Lang::get('general.description'),
			'type' => 'textarea',
			'required' => true,
		]);
		$this->_addField('status', [
			'label' => Lang::get('general.status'),
			'type' => 'select',
			'values' => [
				'1' => Lang::get('general.enabled'),
				'2' => Lang::get('general.disabled'),
			],
			'required' => true,
		]);
		parent::_addFields();
	}

}