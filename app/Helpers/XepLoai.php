<?php
/**
 * Created by PhpStorm.
 * User: cuongdc
 * Date: 5/16/16
 * Time: 2:46 PM
 */

namespace App\Helpers;

use App\Models\DanhGia as Models;
use App\Models\Point;

class XepLoai
{
    public static function XepLoai($diem)
    {
        $xeploai = Point::where('diem','<=',$diem)->orderBy('diem','DESC')->get();
        if($xeploai)
            return $xeploai[0]->name;
        return "C";
    }

    public static function BanXepLoai($thang_id, $_id, $diem)
    {
        $danhgia = Models::where('user_id', '=', $_id)->where('thang_id', '=', $thang_id)->first();
        if (count($danhgia)) {

            if (isset($danhgia->banxeploai) || $danhgia->banxeploai != null)
                return $danhgia->banxeploai;
            else
                return self::XepLoai($diem);
        }
        return self::XepLoai($diem);
    }
}