<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 5/14/16
 * Time: 4:19 PM
 */

namespace App\Helpers;
use Auth;
use App\Models\User as UserModel;
class VaiTro
{
    public static function getEditBan(){
        if (!auth()->check())
            return;
        $id = Auth::id();

        $user = UserModel::find($id);
        if($user->vaitro_id==config('vaitro.TruongBan') || $user->vaitro_id==config('vaitro.PhoTruongBan'))
            return true;
        else
            return false;
    }
    public static function getEditPhong(){
        if (!auth()->check())
            return;
        $id = Auth::id();

        $user = UserModel::find($id);
        if($user->vaitro_id==config('vaitro.TruongPhong') || $user->vaitro_id==config('vaitro.PhoTruongPhong'))
            return true;
        else
            return false;
    }
}