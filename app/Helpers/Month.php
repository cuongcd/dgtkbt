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
        $pdate = str_replace('/','-',$pdate);
        $parts = explode('-', $pdate);
        $month = $parts[0];
        $year= $parts[2];

        return 'Tháng '.$month.'/'.$year;
    }
    public static function getMonthIdByDate($date) {
        $date = str_replace('/','-',$date);
        $parts = explode('-', $date);
        $month = $parts[0];
        $year= $parts[2];

        $date = $year .'-'.$month.'-'.'01';
        $month = 'Tháng '.$month.'/'.$year;
        $month_data = ModelClass::firstOrCreate(['name' =>$month]);
        $month_data->date = $date;
        $month_data->save();

        return $month_data->_id;
    }

    public static function getMonthIds($start_date, $end_date) {

        $date = str_replace('/','-',$start_date);
        $parts = explode('-', $date);
        $month = $parts[0];
        $year= $parts[2];

        $start_date = $year .'-'.$month.'-'.'01';

        $date = str_replace('/','-',$end_date);
        $parts = explode('-', $date);
        $month = $parts[0];
        $year= $parts[2];

        $end_date = $year .'-'.$month.'-'.'01';

        $data = ModelClass::where('date', '>=',$start_date )->where('date', '<=',$end_date )
            ->orderBy('date')
            ->get();
        return $data;



    }

}
