<?php namespace App\Http\Controllers;

use Input;
use App\Blocks\Permission\Grid;
use Redirect;
use Lang;
use App;
use App\Blocks\Permission\Tabs;

class PermissionController extends Controller
{
	function __construct()
	{
		$this->middleware('auth');
		$this->setGridId('permissions');
		$this->setTabsId('permissions');
		$this->setResource('App\Models\Permission');
		$this->setSingularKey('permissions');
		$this->setPluralKey('permissions');
		$this->setModelClass('App\Models\Permission');
	}

	/*
	 * Index Controller
	 * */
	public function indexWithoutParam()
	{
		$grid = new Grid($this->getGridId(), $this->getResource(), $this->getPluralKey());
		$this->setGrid($grid);
		$this->setPageTitle(Lang::get('pages.manage_pages'));
		return $this->loadGrid();
	}

	/*
	 * Index Controller
	 * */
	public function index($filter = null)
	{
		$params = $this->_parseFilter($filter);
		$grid = new Grid($this->getGridId(), $this->getResource(), $this->getPluralKey(), $params);
		$this->setGrid($grid);
		$this->setPageTitle(Lang::get('pages.manage_pages'));
		return $this->loadGrid();
	}

	/*
	* Grid Controller
	* */
	public function grid($filter)
	{
		$params = $this->_parseFilter($filter);
		$grid = new Grid($this->getGridId(), $this->getResource(), $this->getPluralKey(), $params);
		$this->setGrid($grid);
		echo $this->loadAjaxGrid();
	}

	/*
	* Export CSv Controller
	* */
	public function export($type)
	{
		$grid = new Grid($this->getGridId(), $this->getResource(), $this->getPluralKey());
		return $this->exportFile($type, $grid);
	}

	/*
	* Mass delete Controller
	* */
	public function massDelete()
	{
		$idsString = Input::get($this->getGridId());
		$ids = explode(',', $idsString) ? explode(',', $idsString) : $idsString;
		if (count($ids) == 1) {
			App\Models\Page::find($ids)->category()->detach();
		} else {
			foreach ($ids as $id) {
				App\Models\Page::find($id)->category()->detach();
			}
		}

		$data = $this->massDestroy($ids);

		if (isset($data['errors)'])) {
			return Redirect::route('pages.list')->with('error', $data['errors'][0]['message'])->withInput();
		} else {
			$count = count($data);
			return Redirect::route('pages.list')->with('success',
				Lang::get('messages.number_records_have_been_deleted', ['count' => $count]));
		}
	}

	/**
	 * Create form
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		$this->setPageTitle(Lang::get('pages.create_a_permission'));
		$tabs = new Tabs($this->getTabsId());
		$this->setTabs($tabs);
		return $this->loadTabs();
	}


	/**
	 * @param $id
	 * @return $this|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$data = App\Models\Permission::find($id);
		App::instance($this->getTabsId(), $data);
		$this->setPageTitle(Lang::get('pages.edit_permission') . ' # ');
		$tabs = new Tabs($this->getTabsId());
		$this->setTabs($tabs);
		return $this->loadTabs();
	}

	/*
	* Save Controller
	* */
	public function save($id = null)
	{
		$input = Input::all();

		if (!$id) {
			$data = $this->store($input);
		} else {
			$data = $this->update($id, $input);
		}
		if (isset($data['errors']))
			return $id ?
				Redirect::route('permissions.edit', [$id])
					->with('error', $data['errors'][0]['message'])
					->withInput() :

				Redirect::route('permissions.create')
					->with('error', $data['errors'][0]['message'])
					->withInput();
		elseif (Input::get('tab')) {
			$id = $data['_id'];
			return Redirect::route('permissions.edit', [$id, 'tab' => Input::get('tab')])->with('success',
				Lang::get('messages.the_permissions_has_been_saved'));
		} else {
			return Redirect::route('permissions.list')
				->with('success', Lang::get('messages.the_permissions_has_been_saved'));
		}
	}

	/*
  * Delete Controller
  * */
	public function delete($id)
	{
		if ($id) {
			App\Models\Page::find($id)->category()->detach();
			$data = $this->destroy($id);
			if (isset($data['errors']))
				return $id ?
					Redirect::route('pages.edit', [$id])
						->with('error', $data['errors'][0]['message'])
						->withInput() :

					Redirect::route('pages.list')
						->with('error', $data['errors'][0]['message'])
						->withInput();
			else {
				return Redirect::route('pages.list')
					->with('success', Lang::get('messages.the_post_has_been_deleted'));
			}
		} else {
			return Redirect::route('pages.list')
				->with('error', Lang::get('messages.does_not_exist'));
		}
	}

	/**
	 * upload images
	 */
	public function upload()
	{
		$dir = public_path() . '/images/upload';
		$name = $_FILES['file']['name'];

		$arr_name = explode(".", $name);
		$hash = \Hash::make($arr_name[0]);
		$hash = preg_replace('/[^A-Za-z0-9\-]/', '', $hash); // Removes special chars.

		if (move_uploaded_file($_FILES['file']['tmp_name'], "$dir/$hash." . $arr_name[1])) {
			echo 'images/upload' . '/' . $hash . '.' . $arr_name[1];
		} else {
			echo "errors";
		}
	}

	/**
	 * @param $data
	 * @return string
	 */
	public function uploadFile($data)
	{
		$dir = public_path() . '/images/pages';
		$arr_name = $data->getClientOriginalName();
		$arr_name = explode(".", $arr_name);
		$hash = \Hash::make($arr_name[0]);
		$hash = preg_replace('/[^A-Za-z0-9\-]/', '', $hash); // Removes special chars.
		$data->move($dir, $hash . '.' . $arr_name[1]);

		return '/images/pages/' . $hash . '.' . $arr_name[1];
	}
}