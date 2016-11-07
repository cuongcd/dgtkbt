<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 5/25/16
 * Time: 1:20 PM
 */

namespace App\Helpers;

use App\Models\StaffJob;

class GiaoViec
{
    public static function isGiaoViec($user_id,$thang_id){
        $tmp = StaffJob::where('thang_id','=',$thang_id)->where('user_id','=', $user_id)->get();
        if(count($tmp))
            return 1;
        return 0;
    }

}