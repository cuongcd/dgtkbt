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
use Config;
class Menu
{
    public static function getMenu(){
        if (!auth()->check())
            return;
        $id = Auth::id();

        $user = UserModel::find($id);
        if($user->vaitro_id==config('vaitro.TruongBan') || $user->vaitro_id==config('vaitro.PhoTruongBan')){

            $menu = Config::get('menus');
//            $menu['abc'] = ['url' => '/my-acount1',
//                'icon' => 'fa fa-smile-o',
//            ];
//            print_r(json_encode($menu)); die();
            return $menu;
        }
        if($user->vaitro_id==config('vaitro.TruongPhong') || $user->vaitro_id==config('vaitro.PhoTruongPhong'))
           return Config::get('menus');
        elseif($user->vaitro_id=='1')
           return Config::get('admin_menu');
        else
            return Config::get('user_menu');
    }

}