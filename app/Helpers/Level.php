<?php
/**
 * Created by PhpStorm.
 * User: cuongdc
 * Date: 5/6/16
 * Time: 9:34 AM
 */

namespace App\Helpers;

use App\Models\Level as ModelClass;
class Level
{
    public static function getListLevel(){
        $data = ModelClass::all();
        if (isset($data['errors'])) {
            return [];
        }
        $tmp = [];
        foreach($data as $key=> $value){
            $tmp[$value["_id"]] = $value["name"];
        }
        return $tmp;
    }

    public static function getLevel($id){
        $data = ModelClass::where('_id','=',$id)->get();
        if (isset($data['errors'])) {
            return null;
        }
        return $data[0]["name"];
    }

}