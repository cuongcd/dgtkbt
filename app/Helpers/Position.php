<?php
/**
 * Created by PhpStorm.
 * User: cuongdc
 * Date: 5/6/16
 * Time: 10:38 AM
 */

namespace App\Helpers;

use App\Models\Position as ModelClass;

class Position
{

    public  static function getListPositions($room_id){
        $data = ModelClass::where('room_id','=',$room_id)->get();
        if (isset($data['errors'])) {
            return [];
        }
        $tmp = [];
        $tmp[0]="";
        foreach($data as $key=> $value){
            $tmp[$value["_id"]] = $value["name"];
        }
        return $tmp;
    }
    public  static function getAllPositions(){
        $data = ModelClass::all();
        if (isset($data['errors'])) {
            return [];
        }
        $tmp = [];
        $tmp[0]="";
        foreach($data as $key=> $value){
            $tmp[$value["_id"]] = $value["name"];
        }
        return $tmp;
    }
    public  static function getPosition($id){
            try {
            $data = ModelClass::where('_id', '=', $id)->get();
            if (isset($data['errors'])) {
                return null;
            }
            return $data[0]["name"];
        }catch (\Exception $e ){
            return "";
        }
    }

}