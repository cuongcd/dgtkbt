<?php
namespace App\Helpers;

use Auth;
use DB;
use App\Models\User as UserModel;
use App\Models\Role as UserRole;
use App\Models\Notify as Notify;
use Config;
class User
{


    public static function Permissions()
    {
        if (auth()->check()) {
            $id = Auth::id();
            $roles = UserModel::find($id)->roles;
            $data = [];
            foreach ($roles as $role) {
                $permissions = UserRole::find($role->_id)->permission;
                foreach ($permissions as $permission) {
                    if ($permission->status == 1) {
                        if (!in_array($permission->name, $data))
                            $data[] = $permission->name;
                    }
                }
            }
            return $data;

        }
        return [];
    }

    public static function GetAllThongBao(){
        $notifies = (Notify::where('status','=',1)->get());//->orderBy('seq_no','ASC')
        return $notifies;
    }

    public static function getAllUser() {
        $temps = UserModel::select('_id','first_name')->where('first_name', '<>','null')->get();
        $result = [];
        foreach($temps as $key => $value) {
            $result[$value->_id] = $value->first_name;
        }

        return $result;
    }

    public static function isPermissionAddMvp() {
        $is_permission = false;
        $id = Auth::id();
        $user = UserModel::find($id);
        if($user->vaitro_id == Config('vaitro.TruongBan') || $user->vaitro_id == Config('vaitro.PhoTruongBan')){
            $is_permission = true;
        }
        if($user->vaitro_id == Config('vaitro.TruongPhong') || $user->vaitro_id == Config('vaitro.PhoTruongPhong'))
            $is_permission  = true;
        return $is_permission;
    }

    public static function getAllUserPhuTrach() {
        if (auth()->check()) {
            $id = Auth::id();
            $user = UserModel::find($id);

            if ($user->vaitro_id == config('vaitro.TruongBan'))
                return self::getAllUser();
            elseif ($user->vaitro_id == config('vaitro.PhoTruongBan')){
                $phong = self::getUsserByRoomId($user->room_id);
                $taikhoan_phongphutrach = DB::table('taikhoan_phongphutrach')->where('user_id','=',$user->_id)->get();


                if(count($taikhoan_phongphutrach)) {
                    foreach($taikhoan_phongphutrach as $key => $value) {
                        $temp = self::getUsserByRoomId($value->room_id);
                        foreach($temp as $key => $value) {
                            $phong[$key] = $value;
                        }
                    }
                }
                return $phong;
            }
            else
                return self::getUsserByRoomId($user->room_id);

        }

    }

    public static function getUsserByRoomId( $room_id) {
        $temps = UserModel::select('_id','first_name')
                ->where('room_id', '=',$room_id)
                ->where('first_name', '<>','null')->get();
        $result = [];
        foreach($temps as $key => $value) {
            $result[$value->_id] = $value->first_name;
        }

        return $result;
    }

    public static function isVaiTroCapBan() {
            $is_permission = false;
            $id = Auth::id();
            $user = UserModel::find($id);

            if($user->vaitro_id == Config('vaitro.TruongBan') || $user->vaitro_id == Config('vaitro.PhoTruongBan')){
                $is_permission = true;
            }

            return $is_permission;
    }

}
