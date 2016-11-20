<?php
/**
 * Created by PhpStorm.
 * User: cuongdc
 * Date: 5/16/16
 * Time: 2:46 PM
 */

namespace App\Helpers;

use App\Models\Mission as Models;

class ViTriLamViec
{
    public static function ViTriLamViecByRoomId($room_id)
    {
        $temps = Models::select('_id','name')->where('room_id','=',$room_id)->get();
        $result = [];
        foreach($temps as $key => $value) {
            $result[$value['_id']] = $value['name'];
        }

        return $result;


    }
    public static function getAllViTriLamViec(){
        $temps =  Models::select('_id','name')->get();
        $result = [];
        foreach($temps as $key => $value) {
            $result[$value['_id']] = $value['name'];
        }

        return $result;
    }

}