<?php

namespace App\Blocks;

use Session;
use Illuminate\Pagination\Paginator;
use Lang;
use App\Helpers\Setting;

class BaseGrid extends Widget
{
    protected $_gridId = 'baseGrid';
    protected $_massActions = array();
    protected $_useAjax = true;
    protected $_collection = null;
    protected $_gridButtons = array();
    protected $_columns = array();
    protected $_allIds = array();
    protected $_ajaxGridUrl = null;
    protected $_gridUrl = null;

    protected $_itemTotal = null;
    protected $_limit = 20;
    protected $_resource = null;
    protected $_params = [];
    protected $_collectionKey = null;
    protected $_defaultOrder = '_id';
    protected $_defaultDir = 'desc';
    protected $_toExport = false;
    protected $_yesNoSelect = [];
    /**
     * Empty grid text
     *
     * @var sting|null
     */
    protected $_noRecordsText;

    /*
     * @param $girdId string
     * @param $resource string
     * @param $collectionKey string
     * @param $params array
     * @param ajaxUrl string
     *
     */
    public function __construct($gridId, $resource, $collectionKey, $params, $toExport = false)
    {

        $this->setGridId($gridId);
        $this->setResource($resource);
        $this->setCollectionKey($collectionKey);
        $this->setToExport($toExport);
        $this->_addMassactions();
        $this->_addGridButtons();
        $this->_addColumns();
        $this->_addButtons();
        $this->setParams($params);
        $this->setCollection();
        $this->setNoRecordsText(Lang::get('general.no_records_found'));
        $this->setYesNoSelect(['' => Lang::get('general.any'), '1' => Lang::get('general.yes'), '0' => Lang::get('general.no')]);
    }

    /*
     * Set collection
     *
     * */
    public function setCollection()
    {
        $data = $this->getList();
        $this->_allIds = $data['all_ids'];
        $this->_itemTotal = $data['total'];
        $this->_limit = 20;
        $this->_collection = $this->_toExport ? json_decode(json_encode($data['items'])) :
            new Paginator(json_decode(json_encode($data['items'])), $this->getLimit(), 1);
    }


    /**
     * get list object and query filter
     * @return array
     */
    public function getList()
    {
        $class = $this->_resource;
        $query = $this->getFilterParams();
        $model = $class::where('_id', '<>', 0);
        if (isset($query['filter'])) {
            foreach ($query['filter'] as $key => $val) {
                if (is_array($val)) {
                    die('aaaaa');
                    if (isset($val['like'])) {
                        $model = $model->where($key, 'like', '%' . $val['like'] . '%');
                    }
                    if (isset($val['from'])) {
                        $model = $model->where($key, '>=', $val['from']);
                    }
                    if (isset($val['to'])) {
                        $model = $model->where($key, '<=', $val['to']);
                    }

                    if (isset($val['to'])) {
                        $model = $model->where($key, '<=', $val['to']);
                    }

                } else {

                    $model = $model->where($key, '=', $val);
                }
            }
        }

        if (isset($query['order']) && $query['order'] != 'seq_no') {
            $model = $model->orderBy($query['order'], $query['dir']);
        }
        $offset = isset($query['page']) ? 20 * ($query['page'] - 1) : 0;
        $total = $model->count();
        $rows = $model->skip($offset)->take(20)->get();
        $ids = $model->lists('_id');

        return [
            'all_ids' => $ids,
            'items' => $rows->toArray(),
            'total' => $total,
            'page_size' => 20,
            'from' => $offset,
        ];
    }

    /*
     * get column data to show in grid column
     *
     * */
    public function getColumnDataToShow($row, $key)
    {
        $column = $this->_getColumn($key);
        if ($column && $column->getRender()) {
            $renderFunction = $column->getRender();
            return $this->$renderFunction($row, $column);
        }
        return $this->getColumnData($row, $key);
    }

    /*
     * get column data
     *
     * */
    public function getColumnData($row, $key)
    {
        if (strpos($key, '|') === false)
            if (isset($row->$key))
                return $row->$key;
            else
                return null;
        else {
            $attributes = explode('|', $key);
            $tmp = $row;
            $i = 0;
            $count = count($attributes);
            foreach ($attributes as $attribute) {
                if (isset($tmp->$attribute)) {
                    $tmp = $tmp->$attribute;
                    if ($i < ($count - 1) && !is_object($tmp))
                        break;
                }
                $i++;
            }
            $value = ($i < $count - 1) ? null : is_object($tmp) ? null : $tmp;
            return $value;
        }
    }

    /*
     * Get data to export
     *
     * @return array
     */

    public function getDataToExport()
    {
        $collection = $this->getCollection();
        $result = [];

        foreach ($collection as $item) {
            $data = $this->_exportItem($item);
            $result[] = $data;
        }

        if (!count($result)) { // no items
            foreach ($this->_columns as $columnName => $column) {
                if ($this->_isExportColumn($column))
                    $data[$column->getlabel()] = '';
            }
            $result[] = $data;
        }
        return $result;
    }

    /*
     * Get data to export
     *
     * @return array
     */

    public function getColumnFormatToExport()
    {
        $i = 65;
        foreach ($this->_columns as $columnName => $column) {
            $excelColumn = chr($i);
            if ($this->_isExportColumn($column)) {
                if ($column->getType() == 'number')
                    $data[$excelColumn] = '0';
                elseif ($column->getType() == 'currency')
                    $data[$excelColumn] = '#,##0.00';
                elseif ($column->getType() == 'date')
                    $data[$excelColumn] = 'dd/mm/yy';
                elseif ($column->getType() == 'datetime')
                    $data[$excelColumn] = 'm/d/yy h:mm';
                elseif ($column->getType() == 'time')
                    $data[$excelColumn] = 'h:mm:ss';
                else
                    $data[$excelColumn] = 'General';
                $i++;
            }
        }
        return $data;
    }

    /*
     * Get item data
     *
     * @param $item object
     * return array
     */
    protected function _exportItem($item)
    {
        $data = [];
        foreach ($this->_columns as $columnName => $column) {

            if ($this->_isExportColumn($column)) {
                $data[$column->getlabel()] = $this->_getColumnLabel($item, $column);

            }

        }
        return $data;
    }

    /*
     * Get column label to export
     *
     * @param $item object
     * @param $column App\Blocks\Column
     */
    protected function _getColumnLabel($item, $column)
    {
        $value = $this->getColumnDataToShow($item, $column->getName());
        if ($column->getType() != 'select') {
            return strip_tags($value);
        } elseif (isset($column->getOptions()[$value])) {
            return $column->getOptions()[$value];
        }
        return null;
    }

    /*
     * Check column is exported
     *
     * @return bool
     */
    protected function _isExportColumn($column)
    {
        if (!in_array($column->getType(), ['action', 'checkbox']))
            return true;
        return false;
    }

    /*
     * Get last page
     *
     * */
    public function getLastPage()
    {
        if ($this->getItemTotal() == 0)
            return 0;
        elseif ($this->getItemTotal() % $this->getLimit() == 0)
            return $this->getItemTotal() / $this->getLimit();
        else
            return ceil($this->getItemTotal() / $this->getLimit());
    }

    /*
     * Get params, not get param from checkbox, radio column, add time to date[to]
     *
     * */
    public function getFilterParams()
    {
        $params = $this->_params;
        if (isset($params['filter'])) {
            foreach ($params['filter'] as $key => $value) {
                if ($column = $this->_getColumn($key)) {
                    if ($column->getType() == 'checkbox' || $column->getType() == 'radio') {
                        unset($params['filter'][$key]);
                    } elseif ($column->getType() == 'date' || $column->getType() == 'datetime') {
                        if ($column->isTimeZone()) {
                            $timezoneOffset = Setting::getTimeZoneOffset();
                            if (isset($value['to'])) {
                                $toTime = strtotime($value['to']) + 86399 - $timezoneOffset * 3600;
                                $params['filter'][$key]['to'] = date('Y-m-d H:i:s', $toTime);
                            }
                            if (isset($value['from'])) {
                                $fromTime = strtotime($value['from']) - $timezoneOffset * 3600;
                                $params['filter'][$key]['from'] = date('Y-m-d H:i:s', $fromTime);
                            }
                        } else {
                            if (isset($value['to']))
                                $params['filter'][$key]['to'] = date('Y-m-d 23:59:59', strtotime($value['to']));
                        }
                    }
                }
            }
            unset($params['filter']['massaction']);
        }
        if ($this->_toExport) {
            $params['limit'] = 0;
            unset($params['page']);
            unset($params['offset']);
        }
        return $params;
    }

    /*
     * Set params
     *
     * */
    public function setParams($params)
    {
        if (!isset($params['reset']) || $params['reset'] != 1)
            $params = array_replace($this->_getParamSessions(), $params ? $params : []);

        $checkboxColumnName = $this->_getCheckboxColumnName();

        if ($checkboxColumnName) {
            if (!isset($params['filter'][$checkboxColumnName])) {
                unset($params['ids']);
                unset($params['nids']);
            } elseif ($params['filter'][$checkboxColumnName] == 1) {
                $params['ids'] = isset($params['selected_ids']) ? $params['selected_ids'] : implode(',', array_keys($this->getSelectedIds()));
                unset($params['nids']);
            } elseif ($params['filter'][$checkboxColumnName] == 0) {
                $params['nids'] = isset($params['selected_ids']) ? $params['selected_ids'] : implode(',', array_keys($this->getSelectedIds()));
                unset($params['ids']);
            }
            unset($params['selected_ids']);
        }
        if (!isset($params['order']))
            $params['order'] = $this->_defaultOrder;
        if (!isset($params['dir']))
            $params['dir'] = $this->_defaultDir;

        unset($params['reset']);
        $this->_params = $params;
        $this->_setParamSessions($this->_params);
        return $this;
    }


    /*
   * Add column
   *
   * */
    protected function _addColumn($name, $data)
    {
        $this->_columns[$name] = new Column($name, $data);
        return $this;
    }

    /*
     * Get column
     *
     * @return App\Block\Column
     */
    protected function _getColumn($key)
    {
        return isset($this->_columns[$key]) ? $this->_columns[$key] : null;
    }

    /*
   * Remove column
   *
   * */
    protected function _removeColumn($name)
    {
        unset($this->_columns[$name]);
        return $this;
    }

    /*
  * Add buttons
  *
  * */
    protected function _addGridButtons()
    {
        $this->_addGridButton('reset', [
            'label' => Lang::get('general.reset'),
            'type' => 'refresh'
        ])
            ->_addGridButton('search', [
                'label' => Lang::get('general.search'),
                'type' => 'search'
            ]);
    }

    /*
   * Add grid button
   *
   * */
    protected function _addGridButton($name, $data)
    {
        $this->_gridButtons[$name] = $data;
        return $this;
    }

    /*
   * Remove grid button
   *
   * */
    protected function _removeGridButton($name)
    {
        unset($this->_gridButtons[$name]);
        return $this;
    }


    /*
    * set grid title
    *
    * */
    protected function _setGridTitle($title)
    {
        return $this->_gridTitle = $title;
    }

    /*
    * Add massaction
    *
    * */
    protected function _addMassaction($name, $data)
    {
        $this->_massActions[$name] = $data;
        return $this;
    }

    /*
    * Remove massaction
    *
    * */
    protected function _removeMassaction($name)
    {
        unset($this->_massActions[$name]);
        return $this;
    }

    /*
    * Encode grid ID
    *
    * @return string
    * */
    protected function _getEncodedGridId()
    {
        return base64_encode($this->getGridId());
    }

    /*
   * Get sessions
    *
    * @array params
   * */
    protected function _getParamSessions()
    {
        $sessions = Session::all();

        $params = array();

        $encodedGridId = $this->_getEncodedGridId();
        foreach ($sessions as $key => $value) {
            if (strpos($key, $encodedGridId) !== false) {

                $paramKey = substr($key, strlen($encodedGridId) + 1);
                $params[$paramKey] = $value;
            }
        }
        return $params;
    }


    /*
    * Set sessions from input
     *
     * @array params
    * */
    protected function _setParamSessions($params)
    {
        $sessions = Session::all();
        $encodedGridId = $this->_getEncodedGridId();

        //remove session
        foreach ($sessions as $key => $value) {
            if (strpos($key, $encodedGridId) !== false) {
                Session::forget($key);
            }
        }
        //add new session
        foreach ($params as $key => $value) {
            Session::put($encodedGridId . '_' . $key, $value);
        }
    }

    /*
     * Generate grid html
     *
     * @return html
     */
    public function html()
    {
        return view('tabs.grid', array('grid' => $this));
    }

    /*
     * Get selected ids
     *
     * @return array
     */
    public function getSelectedIds()
    {
        return [];
    }

    /*
     * Convert array selected ids to params tring
     *
     * @return string
     */
    public function getSelectedIdsString()
    {
        $str = '';
        foreach ($this->getSelectedIds() as $id => $values) {
            $temp = '';
            foreach ($values as $name => $value) {
                $temp .= $name . '=' . $value . '&';
            }
            $temp = trim($temp, '&');
            $str .= $id . '=' . rawurlencode(base64_encode($temp)) . '&'; //rawurlencode convert = -> %3D
        }
        return trim($str, '&');
    }

    /*
     * Get checkbox column
     *
     * @return string
     */
    protected function _getCheckboxColumnName()
    {
        foreach ($this->_columns as $column) {
            if ($column->getType() == 'checkbox') {
                return $column->getName();
            }
        }
        return 'massaction';
    }

    /*
     * Get row url
     *
     * @param array $row
     * @return string
     */
    public function getRowUrl($row)
    {
        return null;
    }

//    public function showCurrencyFormat($row, $column)
//    {
//        $row = json_decode(json_encode($row), true);
//        if (isset($row['currency_template']) && isset($row[$column->getName()]))
//            return HelperOrder::Format($row['currency_template'], $row[$column->getName()]);
//
//    }

}