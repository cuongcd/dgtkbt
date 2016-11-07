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

        if ($user->vaitro_id == config('vaitro.TruongBan') || $user->vaitro_id == config('vaitro.PhoTruongBan'))
            return self::getListRoom();
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
        $_id = $_id-2;
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
            default :
                return 'XI';
        }
    }
}