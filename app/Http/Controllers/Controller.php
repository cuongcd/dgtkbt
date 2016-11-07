<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Exception;
use Session;
use Excel;
use Lang;
use Request;
use Input;
use Validator;
use Redirect;

abstract class Controller extends BaseController
{
    protected $layout = "layouts.inventory";
    protected $pageTitle;
    protected $gridId;
    protected $tabsId;
    protected $grid;
    protected $tabs;
    protected $resource;
    protected $singularKey;
    protected $pluralKey;
    protected $modelClass;

    use DispatchesCommands, ValidatesRequests;

    /*
    * Export CSv Controller
    *
    * @param string $fileType
    * @param grid object $grid
    * */
    public function exportFile($fileType, $grid)
    {
        $name = $grid->getCollectionKey();
        $data = $grid->getDataToExport();
        $format = $grid->getColumnFormatToExport();
        Excel::create($name, function ($excel) use ($data, $format) {
            $excel->sheet($excel->getTitle(), function ($sheet) use ($data, $format) {
                $sheet->freezeFirstRow();
                $sheet->setAutoSize(true);
                $sheet->fromArray($data);
                $sheet->setColumnFormat($format);
            });
        })->download($fileType);
    }

    /*
    * Parse filter to params
    *
    * @return array
    * */
    protected function _parseFilter($filter)
    {
        $paramString = base64_decode($filter);
        parse_str($paramString, $params);
        return $params;
    }

    /*
    * Load grid
    *
    * @return html
    * */
    protected function loadGrid()
    {
        return view($this->layout, [
            'content' => view('grid.container', ['grid' => $this->getGrid()]),
            'pageTitle' => $this->getPageTitle()
        ]);
    }

    /*
    * Load ajax grid
    *
    * @return html
    * */
    protected function loadAjaxGrid($ajax = 0)
    {
        if (!$ajax)
            return view('grid.content', array('grid' => $this->getGrid()));
        return view('tabs.grid', array('grid' => $this->getGrid()));
    }

    /*
    * Load tabs
    *
    * @param Tabs object
    * @return html
    * */
    protected function loadTabs()
    {
        return view($this->layout, [
            'content' => view('tabs.index', [
                'tabs' => $this->getTabs()
            ]),
            'pageTitle' => $this->getPageTitle()
        ]);
    }
    protected function loadMap()
    {
        return view($this->layout, [
            'content' => view('welcome'),
            'pageTitle' => $this->getPageTitle()
        ]);
    }

    /*
    * Get plural key
    *
    *@return string
    * */
    public function getPluralKey()
    {
        return $this->pluralKey;
    }

    /*
    * Set plural key
    *@param string
    *@return this
    * */
    public function setPluralKey($pluralKey)
    {
        $this->pluralKey = $pluralKey;
        return $this;
    }

    /*
    * Get singular key
    *
    * @return string
    * */
    public function getSingularKey()
    {
        return $this->singularKey;
    }

    /*
    * Set singular key
    *
    * @param string
    * @return this
    * */
    public function setSingularKey($singularKey)
    {
        $this->singularKey = $singularKey;
        return $this;
    }

    /*
    * Get resource
    *
    *@return string
    * */
    public function getResource()
    {
        return $this->resource;
    }

    /*
    * Set resource
    *
    * @param string
    * @return this
    * */
    public function setResource($resource)
    {
        $this->resource = $resource;
        return $this;
    }

    /*
    * Get grid
    *
    * @return pp\Block\BaseGrid
    * */
    public function getGrid()
    {
        return $this->grid;
    }

    /*
    * Set grid
    * @param App\Block\BaseGrid
    * @return this
    * */
    public function setGrid($grid)
    {
        $this->grid = $grid;
        return $this;
    }

    /*
    * Get tabs
    *
    * @return pp\Block\BaseGrid
    * */
    public function getTabs()
    {
        return $this->tabs;
    }

    /*
    * Set tabs
    *
    * @param App\Block\BaseTabs
    * @return this
    * */
    public function setTabs($tabs)
    {
        $this->tabs = $tabs;
        return $this;
    }

    /*
    * Get grid id
    *
    *@return string
    * */
    public function getGridId()
    {
        return $this->gridId;
    }

    /*
    * set page title
    *
    * return this
    * */
    public function setGridId($gridId)
    {
        $this->gridId = $gridId;
        return $this;
    }

    /*
    * Get tabs id
    *
    *@return string
    * */
    public function getTabsId()
    {
        return $this->tabsId;
    }

    /*
    * set tabs id
    *
    * return this
    * */
    public function setTabsId($tabsId)
    {
        $this->tabsId = $tabsId;
        return $this;
    }

    /*
    * get page title
    *
    *@return string
    * */
    public function getPageTitle()
    {
        return $this->pageTitle;
    }

    /*
    * set page title
    *
    * return this
    * */
    public function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle;
        return $this;
    }

    /*
     * Convert object to array
     *
     * @return array
     */
    public function objectToArray($obj)
    {
        return json_decode(json_encode($obj), true);
    }

    /*
     * Convert array
     * Ex: ['warehouse|_id' => 1]
     *  -->  ['warehouse' => ['_id' => 1]]
     *
     * @return array
     */
    public function _processData($data)
    {
        $newData = [];
        foreach ($data as $key => $value) {
            if ($key != '_token') {
                $temp = explode('|', $key);
                if (count($temp) == 1)
                    $newData[$temp[0]] = $value;
                elseif (count($temp) == 2)
                    $newData[$temp[0]][$temp[1]] = $value;
                elseif (count($temp) == 3)
                    $newData[$temp[0]][$temp[1]][$temp[2]] = $value;
                elseif (count($temp) == 4)
                    $newData[$temp[0]][$temp[1]][$temp[2]][$temp[3]] = $value;
                elseif (count($temp) == 5)
                    $newData[$temp[0]][$temp[1]][$temp[2]][$temp[3]][$temp[4]] = $value;
            }
        }
        return $newData;
    }

    /*
     * Get data from excel file
     *
     * @param File $file
     * @return string
     */
    protected function _getDataFromExcel($file, $attributes)
    {
        $data = [];
        Excel::selectSheetsByIndex(0)->load($file, function ($reader) use (&$data) {
            $reader->each(function ($row) use (&$data) {
                $data[] = $row->toArray();
            });
        });

        if (count($data)) {
            $tempKeys = array_keys($data[0]);
            foreach ($attributes as $attribute) {
                if (!in_array($attribute, $tempKeys, true)) {
                    throw new Exception(Lang::get('messages.the_uploaded_file_format_is_incorrect'));
                    break;
                }
            }
        } else {
            throw new Exception(Lang::get('messages.the_uploaded_file_is_empty'));
        }

        return $data;
    }


    /**
     * Get model class
     * @return string
     */
    public function getModelClass()
    {
        return $this->modelClass;
    }

    /**
     * Set model class
     * @return $this
     */
    public function setModelClass($modelClass)
    {
        $this->modelClass = $modelClass;
        return $this;
    }


    /**
     * Create a new object.
     * @param $data
     * @input  array $data
     * @return  array
     */
    public function store($data = [])
    {
        $modelClass = $this->getModelClass();
        $validator = Validator::make($data, $modelClass::rules());

        if (!$validator->passes()) {
            return ['errors' => [
                ['code' => 'errors',
                    'message' => $validator->messages()->first()]
            ]
            ];
        }

        $model = new $modelClass($data);
        try {
            $model->save();
            return $model->ToArray();
        } catch (Exception $e) {
//            print_r($e->getMessage()); die();
            return ['errors' => [0 => [
                'code' => $e->getCode(),
                'message' => $e->getMessage()
            ]]
            ];
        }
    }


    /**
     * edit a object
     * @param $id
     * @param null $nested_id
     * @return mixed
     */
    public function show($id, $nested_id = null)
    {
        $modelClass = $this->getModelClass();
        $fieldsString = Request::get('fields');
        $fields = $fieldsString ? explode(',', $fieldsString) : array();
        try {
            $model = $modelClass::find($id);
            if (!$model) {
                return [
                    'errors' => [
                        ['code' => 'not_exist',
                            'message' => Lang::get('general.the_customer_does_not_exist')]
                    ]
                ];
            }
            return $model->ToArray();
        } catch (Exception $e) {
            return [
                'errors' => [0 => [
                    ['code' => $e->getCode(), 'message' => $e->getMessage()]]
                ]
            ];
        }
    }

    /**
     * update a object
     * @param $id
     * @param  $data
     * @return mixed
     */
    public function update($id, $data)
    {
        $modelClass = $this->getModelClass();

        $validator = Validator::make($data, $modelClass::rules($id));

        if (!$validator->passes()) {
            return ['errors' => [
                ['code' => 'errors',
                    'message' => $validator->messages()->first()]
            ]
            ];
        }

        try {
            $model = $modelClass::find($id);
            if (!$model) {
                return [
                    'errors' => [
                        ['code' => 'not_exist', 'message' => Lang::get('general.the_customer_does_not_exist')]
                    ]
                ];
            }
            $model->fill($data);
            $model->save();
            return $model->ToArray();
        } catch (Exception $e) {
            return [
                'errors' => [0 => [
                    ['code' => $e->getCode(), 'message' => $e->getMessage()]]
                ]
            ];
        }
    }


    /**
     * delete a object
     * @param $id
     * @param null $nested_id
     * @return mixed
     */
    public function destroy($id, $nested_id = null)
    {
        $modelClass = $this->getModelClass();
        try {
            $model = $modelClass::find($id);
            if (!$model) {
                return [
                    'errors' => [
                        ['code' => 'not_exist', 'message' => Lang::get('general.the_item_does_not_exist')]
                    ]
                ];
            }
            $model->delete();
            return
                $model->getKey();

        } catch (Exception $e) {
            return [
                'errors' => [0 => [
                    ['code' => $e->getCode(), 'message' => $e->getMessage()]]
                ]
            ];
        }
    }

    /**
     * mass destroy
     * @param array $ids
     * @return mixed
     */
    public function massDestroy($ids = [])
    {
        $modelClass = $this->getModelClass();
        try {
            if (count($ids) == 1) {
                $this->destroy($ids[0]);
            } else {
                foreach ($ids as $id) {
                    $this->destroy($id);
                }
            }
            return $ids;
        } catch (Exception $e) {
            return [
                'errors' => [0 => [
                    ['code' => $e->getCode(), 'message' => $e->getMessage()]]
                ]
            ];
        }
    }
}
