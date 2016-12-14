<?php
/**
 * Created by PhpStorm.
 * User: cuongdc
 * Date: 5/6/16
 * Time: 9:34 AM
 */

namespace App\Helpers;

use App\Models\Mvp as ModelClass;
class Mvp {
    public static function isTieuBieu($user_id, $thang_id) {
        $data = ModelClass::where('user_id', '=', $user_id)->where('thang_id', '=', $thang_id)->get();
        if (count($data) > 0)
            return true;
        return false;
    }
    public static function getStatusBanDuyetThang($thang_id) {
        $data = ModelClass::where('is_banduyet', '=', 1)->where('thang_id', '=', $thang_id)->get();
        if (count($data) > 0)
            return true;
        return false;
    }

}