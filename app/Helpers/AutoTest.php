<?php
/**
 * Created by PhpStorm.
 * User: cuongdc
 * Date: 5/18/16
 * Time: 2:14 PM
 */

namespace App\Helpers;
use App\Models\Discripline;
use App\Models\Dignity;
use App\Models\Contribute;
class AutoTest
{

    public static function KyLuat($level_id, $room_id,$chucdanh_id)
    {
        $datas = Discripline::where('level_id','=',5)->where('room_id','=',5)->where('chucdanh_id','=',18)->get();
        if(count($datas)){
            foreach($datas as $value){
                $discripline = new Discripline();
                $discripline->level_id = $level_id;
                $discripline->room_id = $room_id;
                $discripline->chucdanh_id = $chucdanh_id;
                $discripline->name = $value->name;
                $discripline->diemtru = $value->diemtru;
                $discripline->save();
                unset($discripline);
            }
        }
    }
    public static function PhamChatCaNhan($level_id, $room_id,$chucdanh_id)
    {
        $datas = Dignity::where('level_id','=',5)->where('room_id','=',5)->where('chucdanh_id','=',18)->get();
        if(count($datas)){
            foreach($datas as $value){
                $discripline = new Dignity();
                $discripline->level_id = $level_id;
                $discripline->room_id = $room_id;
                $discripline->chucdanh_id = $chucdanh_id;
                $discripline->name = $value->name;
                $discripline->diemtru = $value->diemtru;
                $discripline->save();
                unset($discripline);
            }
        }
    }
    public static function DongGop($level_id, $room_id,$chucdanh_id)
    {
        $datas = Contribute::where('level_id','=',5)->where('room_id','=',5)->where('chucdanh_id','=',18)->get();
        if(count($datas)){
            foreach($datas as $value){
                $discripline = new Contribute();
                $discripline->level_id = $level_id;
                $discripline->room_id = $room_id;
                $discripline->chucdanh_id = $chucdanh_id;
                $discripline->name = $value->name;
                $discripline->diemcong = $value->diemcong;
                $discripline->save();
                unset($discripline);
            }
        }
    }
}