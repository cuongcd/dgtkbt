<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 5/14/16
 * Time: 4:19 PM
 */

namespace App\Helpers;

use App\Models\Quality as ModelClass;
use DB;
class ChatLuong
{
    public static function getChatLuong(){
        $data = \Session::get('staffData');
        if(!isset($data))
            return [];

        $vitrilamviecs = DB::table('taikhoan_vitrilamviec')->where('user_id','=',$data->_id)->get();
        $mission_arr = [];
        foreach($vitrilamviecs as $key =>$value) {
            $mission_arr[] = $value->vitrilamviec_id;
        }

        $Job = ModelClass::where('level_id' ,'=',$data->level_id)->where('chucdanh_id','=',$data->chucdanh_id)
            ->whereIn('mission_id', $mission_arr)->get();

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