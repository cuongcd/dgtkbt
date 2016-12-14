<?php
/**
 * Created by PhpStorm.
 * User: cuongdc
 * Date: 5/6/16
 * Time: 8:16 AM
 */
namespace App\Helpers;

use App\Models\Room as ModelClass;
use App\Models\User as UserModel;
use Auth;
use DB;
class Room
{

    public static function getListRoom()
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

    public static function getAllRoom()
    {
        $data = ModelClass::all();
        if (isset($data['errors'])) {
            return [];
        }
        $tmp = [];
        foreach ($data as $key => $value) {
            $tmp[$value["_id"]] = $value["name"];
        }
        return $data;
    }

    public static function getRoomPhuTrach()
    {
        if (!auth()->check())
            return [];
        $id = Auth::id();
        $tmp = [];
        $user = UserModel::find($id);

        if ($user->vaitro_id == config('vaitro.TruongBan'))
            return self::getListRoom();
        elseif ($user->vaitro_id == config('vaitro.PhoTruongBan')){
            $phong = self::getRoomById($user->room_id);
            $taikhoan_phongphutrach = DB::table('taikhoan_phongphutrach')->where('user_id','=',$user->_id)->get();


            if(count($taikhoan_phongphutrach)) {
                foreach($taikhoan_phongphutrach as $key => $value) {
                    $temp = self::getRoomById($value->room_id);
                    foreach($temp as $key => $value) {
                        $phong[$key] = $value;
                    }
                }
            }
            return $phong;
        }
        else
            return self::getRoomById($user->room_id);
    }

    public static function getRoomById($_id)
    {
        $data = ModelClass::where('_id', '=', $_id)->first();
        if (!count($data))
            return [];
        $tmp = [];
        $tmp[$data["_id"]] = $data["name"];
        return $tmp;
    }

    public static function getID($_id){
        switch($_id){
            case 1:
                return 'I';
            case 2:
                return 'II';
            case 3:
                return 'III';
            case 4:
                return 'IV';
            case 5:
                return 'V';
            case 6:
                return 'VI';
            case 7:
                return 'VII';
            case 8:
                return 'VIII';
            case 9:
                return 'IX';
            case 10:
                return 'X';
            case 11:
                return 'XI';
            case 12:
                return 'XII';
            case 13:
                return 'XIII';
            case 14:
                return 'XIV';
            case 15:
                return 'XV';
            case 16:
                return 'XVI';
            case 17:
                return 'XVII';
            case 18:
                return 'XVIII';
            case 19:
                return 'XIX';
            case 20:
                return 'XX';

            default :
                return 'I';
        }
    }
}