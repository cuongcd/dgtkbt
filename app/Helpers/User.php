<?php
namespace App\Helpers;

use Auth;
use DB;
use App\Models\User as UserModel;
use App\Models\Role as UserRole;
use App\Models\Notify as Notify;
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
//        print_r(json_encode($notifies));
//        die();die
    }

}
