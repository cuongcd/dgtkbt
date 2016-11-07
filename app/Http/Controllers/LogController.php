<?php
namespace App\Http\Controllers;

use Input;
use App\Blocks\Log\Grid;
use Redirect;
use Lang;
use App;
use App\Blocks\Log\Tabs;
use Session;
use File;
use Request;

class LogController extends Controller
{
	function __construct()
	{
		$this->middleware('auth');
		$this->setGridId('logs');
		$this->setTabsId('log');
		$this->setResource('App\Models\Log');
		$this->setSingularKey('log');
		$this->setPluralKey('logs');
		$this->setModelClass('App\Models\Log');
	}


	/**
	 * @return \Illuminate\View\View
	 */
	public function indexWithoutParam()
	{
		$grid = new Grid($this->getGridId(), $this->getResource(), $this->getPluralKey());
		$this->setGrid($grid);
		$this->setPageTitle(Lang::get('Manage Logs'));
		return $this->loadGrid();
	}


	/**
	 * @param null $filter
	 * @return \Illuminate\View\View
	 */
	public function index($filter = null)
	{
		$params = $this->_parseFilter($filter);
		$grid = new Grid($this->getGridId(), $this->getResource(), $this->getPluralKey(), $params);
		$this->setGrid($grid);
		$this->setPageTitle(Lang::get('general.manage_record'));
		return $this->loadGrid();
	}


	/**
	 * grid controller
	 * @param $filter
	 */
	public function grid($filter)
	{
		$params = $this->_parseFilter($filter);
		$grid = new Grid($this->getGridId(), $this->getResource(), $this->getPluralKey(), $params);
		$this->setGrid($grid);
		echo $this->loadAjaxGrid();
	}


	/**
	 * export excel
	 * @param $type
	 */
	public function export($type)
	{
		$grid = new Grid($this->getGridId(), $this->getResource(), $this->getPluralKey());
		$this->exportFile($type, $grid);
	}


	/**
	 * mass delete customer
	 * @return $this|\Illuminate\Http\RedirectResponse
	 */
	public function massDelete()
	{
		$idsString = Input::get($this->getGridId());
		$ids = explode(',', $idsString) ? explode(',', $idsString) : $idsString;
		$data = $this->massDestroy($ids);
		if (isset($data['errors)'])) {
			return Redirect::route('logs.list')->with('error', $data['errors'][0]['message'])->withInput();
		} else {
			$count = count($data);
			return Redirect::route('logs.list')->with('success',
				Lang::get('messages.number_records_have_been_deleted', ['count' => $count]));
		}
	}


	/**
	 * create customer form
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		$this->setPageTitle(Lang::get('menus.create_a_menu'));
		$tabs = new Tabs($this->getTabsId());
		$this->setTabs($tabs);
		return $this->loadTabs();
	}


	/**
	 * edit customer form
	 * @param $id
	 * @return $this|\Illuminate\View\View
	 */
	public function edit($id)
	{

		$data = $this->show($id, null);
		if (isset($data['errors'])) {
			return Redirect::route('logs.list')
				->with('error', $data['errors'][0]['message'])
				->withInput();
		}
		App::instance($this->getTabsId(), $data);
		$this->setPageTitle(Lang::get('Log') . ' # ' . $data['_id']);
		$tabs = new Tabs($this->getTabsId());
		$this->setTabs($tabs);
		return $this->loadTabs();
	}

	/**
	 * create or update customer
	 * @param null $id
	 * @return $this|\Illuminate\Http\RedirectResponse
	 */
	public function save($id = null)
	{

	}


	/**
	 * delete customer
	 * @param $id
	 * @return $this|\Illuminate\Http\RedirectResponse
	 */
	public function delete($id)
	{
		if ($id) {
			$data = $this->destroy($id);
			if (isset($data['errors']))
				return $id ?
					Redirect::route('images.edit', [$id])
						->with('error', $data['errors'][0]['message'])
						->withInput() :

					Redirect::route('logs.list')
						->with('error', $data['errors'][0]['message'])
						->withInput();
			else {
				return Redirect::route('logs.list')
					->with('success', Lang::get('the Log has been deleted'));
			}
		} else {
			return Redirect::route('logs.list')
				->with('error', Lang::get('the Log has been deleted'));
		}
	}

	public function import()
	{

		ini_set('max_execution_time', 300);
		$file = Request::file('file');
		if (!$file->isValid())
			return 'No data could be read in the file.';
		$filename = $file->getClientOriginalName();
		$extension = $file->getClientOriginalExtension();
		$extension_guessed = $file->guessExtension();
//		if ($extension != $extension_guessed) {
//			return 'No data could be read in the file.';
//		}
		$filename_new = str_random(20) . '.' . $extension;
		$path = public_path() . '/assets/log';
		$file->move($path, $filename_new);
		$row = 1;
		$filePath = $path . '/' . $filename_new;
		if (($handle = fopen($filePath, "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$num = count($data);
				$row++;
				if ($row == 2)
					continue;
				for ($c = 0; $c < $num; $c++) {
					if ($c == 4) {
						foreach (explode("\\n", $data[4]) as $key => $value) {
							$b = json_decode($value, true);
							if (isset($b['tp']) && ($b['tp'] == 's_play' || $b['tp'] == 's_download')) {

								$log = [];
								$log['agent'] = isset($data[1]) ? $data[1] : '';
								$log['ip'] = isset($data[2]) ? $data[2] : '';
								$log['mac'] = isset($data[3]) ? $data[3] : '';
								$log['created_at'] = isset($data[5]) ? $data[5] : '';
								$log['app_version_code'] = array_get($b, 'vc');
								$log['app_version_name'] = array_get($b, 'vn');
								$log['language'] = array_get($b, 'la');
								$log['db_version'] = array_get($b, 'dv');
								$log['action_type'] = array_get($b, 'tp');
								if ($b['tp'] == 's_download') {
									$arr = explode(',', array_get($b, 'dt'));
									$log['song_id'] = isset($arr[0]) ? $arr[0] : '-1';
									$log['action_value'] = isset($arr[1]) ? $arr[1] : '-1';
								} else
									$log['song_id'] = array_get($b, 'dt');
								$this->store($log);
							}
						}
					}
				}
			}
			fclose($handle);
			File::delete($path . '/' . $filename_new);
			return 'Log were import success.';
		}
	}
}