<?php
namespace App\Blocks\Dashboard\Dashboard;
use Config;
use App\Client\RestClient;
class stdClass{}
class Dashboard{
    public $_configData = null;
    public $_title = null;
    public $_data = null;
    public $_topColors = null;
    public $_noRecordsText = 'No records found';

    public function __construct($title){
        $this->setTitle($title);
        $this->setData();
        $this->setTopColors();
    }

    public function setTitle($title){
        $this->_title = $title;
    }
    
    public function setTopColors(){ //Return label's color on top dashboard
        $colors = array();
        $colors['total_sales'] = 'primary';
        $colors['items_sold'] = 'info';
        $colors['number_of_orders'] = 'danger';
        $colors['total_invoiced'] = 'success';
        $colors['total_refunded'] = 'warning';
        $colors['total_shipped'] = 'primary';
        $colors['total_purchased'] = 'info';
        $colors['total_stock'] = 'danger';
        $colors['total_value_stock'] = 'success';
        $colors['total_products'] = 'warning';
        $colors['total_warehouses'] = 'primary';
        $colors['total_suppliers'] = 'info';
        $colors['total_customers'] = 'danger';
        $this->_topColors = $colors;
    }
    
    public function setData(){
//        $configData = $this->call('dashboard', '', 1);    //Check if isset config dashboard in database
//        if(empty($configData) || count($configData) < 1){
            $configData = json_decode(Config::get('dashboard.config'), true);  //Use default config dashboard
//        }
        $data = array();
        $data['top'] = $this->getTopData($configData['top']);   //Top data
        $data['middle'] = $this->getMiddleData($configData['middle']);  //Middle data
        $data['bottom'] = $this->getBottomData($configData['bottom']);  //Bottom data
        $this->_data = $data;
    }
    
    public function getTopData($top){
        foreach($top as $top_key => $top_value){
            if($top_value == 'yes'){
                $top_data[$top_key] = $this->$top_key();    //Call functions to get top data
            }
        }
        return $top_data;
    }
    
    public function getMiddleData($middle){    //Call functions to get middle data
        return $middle;
    }
    
    public function getBottomData($bottom){    //Call functions to get bottom data
        foreach($bottom as $bottom_key => $bottom_value){
            if($bottom_value == 'yes'){
                $bottom_data[$bottom_key] = $this->$bottom_key();
            }
        }
        return $bottom_data;
    }
    
    public function getDashboardTitle(){
        $title = array();
        $title['number_of_orders'] = 'Orders';
        $title['total_products'] = 'Products';
        $title['total_warehouses'] = 'Warehouses';
        $title['total_suppliers'] = 'Suppliers';
        //...
        return $title;
    }
//--------- Top ----------
    public function number_of_orders(){
        $data = $this->call('orders', '', 0);
        return count($data);
    }
    
    public function total_products(){
        $data = $this->call('products', '', 0);
        return count($data);
    }
    
    public function total_warehouses(){
        $data = $this->call('warehouses', '', 0);
        return count($data);
    }
    
    public function total_suppliers(){
        $data = $this->call('suppliers', '', 0);
        return count($data);
    }
    //Anothers top functions ...
    
//----------- End Top -----------
    
//----------- Middle ------------
    //Anothers top functions ...
//---------- End Middle ------------

//----------- Bottom ------------
    
    public function recent_orders(){
        $orders = array();
        $data = $this->call('orders', '', 0);
        foreach($data as $data_key => $data_value){
            $orders[$data_key]['seq_no'] = $data_value->seq_no;
            $orders[$data_key]['created_at'] = $data_value->created_at;
            $orders[$data_key]['total_qty_ordered'] = $data_value->total_qty_ordered;
            $orders[$data_key]['grand_total'] = $data_value->grand_total;
        }
        return $orders;
    }
    
    public function best_sellers(){
        $orders = array();
        $orders = $this->call('orders', '', 0);
        if(empty($orders) || count($orders) == 0){
            return;
        }
        
        foreach($orders as $filter_order){
            if(!isset($filter_order->items)){continue;}
            foreach($filter_order->items as $values){
                $data[] = $values;
            }
        }
        $new_data = array();
        foreach($data as $value){
            if(isset($value->qty_cancelled) && isset($value->qty_returned)){
                $new_data[][$value->sku] =  $value->qty_ordered - $value->qty_cancelled - $value->qty_returned;
            }
            if(isset($value->qty_cancelled) && !isset($value->qty_returned)){
                $new_data[][$value->sku] =  $value->qty_ordered - $value->qty_cancelled;
            }
            if(!isset($value->qty_cancelled) && isset($value->qty_returned)){
                $new_data[][$value->sku] =  $value->qty_ordered - $value->qty_returned;
            }
            else{
                $new_data[][$value->sku] =  $value->qty_ordered;
            }
        }
        $chart_data = array();
        foreach($new_data as $key => $value){
            foreach($value as $k => $val){
                if(isset($chart_data[$k])){
                    $chart_data[$k] += $val;
                }
                else{
                    $chart_data[$k] = $val;
                }
            }
        }
        
        arsort($chart_data);
        $obj_data = array();
        $object = new stdClass();
        $variants = $this->call('variants','',1);
        $products = $this->call('products','',1);
        $sku = array_column($variants, 'sku');
        $product_id = array_column($variants, 'product_id');
        $seq_no = array_column($variants, 'seq_no');
        $p_id = array_column($products, '_id');
        $p_name = array_column($products, 'name');
        foreach ($chart_data as $key => $value){
            $object = new stdClass();
            foreach($sku as $k => $v){
                if($key == $v){
                    $object->seq_no = $seq_no[$k];
                    foreach($p_id as $p => $id){
                        if($product_id[$k] == $id){
                            $object->name = $p_name[$p];
                        }
                    }
                    if(!isset($object->name) || empty($object->name)){break;}
                    $object->sku = $sku[$k];
                    if(!isset($object->sku) || empty($object->sku)){break;}
                    $object->sold_qty = $value;
                    $obj_data[] = $object;
                    $sks[] = $sku[$k];
                    unset($object);
                    break;
                }
            }
        }
        return $obj_data;
    }
    //Anothers top functions ...
//---------- End Bottom ----------
    
    public function call($path, $plural, $array) {
        if($plural == ''){$plural = $path;}
        $options['query']['limit'] = 0;
        $response = RestClient::call('GET', $path, $options);
        if($array == 1){
            $output = json_decode($response->getBody()->getContents(), true)[$plural];
        }
        else{
            $output = json_decode($response->getBody()->getContents())->$plural;
        }
        return $output;
    }

}