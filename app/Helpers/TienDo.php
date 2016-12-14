<?php
/**
 * Created by PhpStorm.
 * User: cuongdc
 * Date: 5/9/16
 * Time: 2:01 PM
 */

namespace App\Helpers;
use App\Models\Progress as ModelClass;
use DB;
class TienDo
{
    public static function getTienDo(){
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