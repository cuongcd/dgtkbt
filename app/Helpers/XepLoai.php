<?php
/**
 * Created by PhpStorm.
 * User: cuongdc
 * Date: 5/16/16
 * Time: 2:46 PM
 */

namespace App\Helpers;

use App\Models\DanhGia as Models;

class XepLoai
{
    public static function XepLoai($diem)
    {
        if ($diem >= 90)
            return "A*";
        if ($diem >= 85)
            return "A1";
        if ($diem >= 80)
            return "A2";
        if ($diem >= 70)
            return "B1";
        if ($diem >= 60)
            return "B2";
        if ($diem >= 50)
            return "B3";
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