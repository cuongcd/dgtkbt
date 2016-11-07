<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 5/14/16
 * Time: 5:13 PM
 */

namespace App\Helpers;
use App\Models\Dignity as ModelClass;

class PhamChat
{

    public static function getPhamChat(){
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