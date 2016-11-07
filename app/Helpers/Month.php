<?php
/**
 * Created by PhpStorm.
 * User: cuongdc
 * Date: 5/9/16
 * Time: 10:00 AM
 */

namespace App\Helpers;

use App\Models\Month as ModelClass;
use DateTime;
class Month
{

    public static function getAllMonth()
    {
        $data = ModelClass::all();
        if (isset($data['errors'])) {
            return [];
        }
        $tmp = [];
        foreach ($data as $key => $value) {
            $tmp[$value["_id"]] = $value["name"];
        }
        return $tmp;
    }

    public static function getCurrentMonth()
    {
        $data = ModelClass::all();
        if (isset($data['errors'])) {
            return [];
        }
        foreach ($data as $key => $value) {
            if ($value["thanghientai"] == 1)
                return $value;
        }
        return $data[0];
    }
    public static function setToCurrent($id){
        \DB::table('thang')->update(['thanghientai' => 0]);
        \DB::table('thang')->where('_id','=',$id)->update(['thanghientai' => 1]);
    }
    public static function getThangByID($thang_id){
        $data = ModelClass::where('_id','=',$thang_id)->get()->first();
        if($data)
            return $data->name;
       return "";

    }
    // $pdate = 2016-12-31;
    public static function getMonthByDate($pdate) {
        $parts = explode('-', $pdate);
        $month = $parts[1];
        $year= $parts[0];

        return 'Tháng '.$month.'/'.$year;
    }
    public static function getMonthIdByDate($date) {
        $month = self::getMonthByDate($date);
        $month_data = ModelClass::firstOrCreate(['name' =>$month]);
        return $month_data->_id;
    }
}
