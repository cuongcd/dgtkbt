<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 5/14/16
 * Time: 4:35 PM
 */

namespace App\Helpers;

use App\Models\Discripline as ModelClass;

class KyLuat
{
    public static function getKyLuat(){
        $data = \Session::get('staffData');
        if(!isset($data))
            return [];
        $Job = ModelClass::where('level_id' ,'=',$data->level_id)->where('chucdanh_id','=',$data->chucdanh_id)->get();
        if (isset($Job['errors'])) {
            return [];
        }
        $tmp = [];
        foreach($Job as $key=> $value){
            $tmp[$value["_id"]] = $value["name"];
        }
        return $tmp;
    }

}