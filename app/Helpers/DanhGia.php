<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 5/14/16
 * Time: 4:19 PM
 */

namespace App\Helpers;

use App\Models\DanhGia as ModelClass;
use App\Models\User as UserModel;
use Auth;

class DanhGia
{
    public static function getDanhGiaThang($thang_id)
    {
        $data = \Session::get('staffData');
        if (!isset($data))
            return [];
        $danhgia = ModelClass::where('user_id', '=', $data->_id)->where('thang_id', '=', $thang_id)->get();
        if (!count($danhgia)) {
            return [];
        }
        return $danhgia;
    }

    public static function getDanhGiaTaiKhoanThang($user_id, $thang_id)
    {
        $danhgia = ModelClass::where('user_id', '=', $user_id)->where('thang_id', '=', $thang_id)->first();
        if (!count($danhgia)) {
            unset($danhgia);
            $danhgia = New ModelClass();
            $danhgia->user_id = $user_id;
            $danhgia->thang_id = $thang_id;
            $danhgia->tudanhgia = 0;
            $danhgia->phongdanhgia = 0;
            $danhgia->bandanhgia = 0;
            $danhgia->save();
        }

        return $danhgia;

    }

    public static function getDanhGiaByPhong($phong_id, $thang_id)
    {
        $users = UserModel::where('room_id', '=', $phong_id)->get();
        foreach ($users as $user) {
            self::getDanhGiaTaiKhoanThang($user->_id, $thang_id);
        }
        return;
    }

    public static function updateStatusRate($thang_id, $self)
    {

        $data = \Session::get('staffData');
        if (!isset($data))
            return false;
        if (!auth()->check())
            return;
        $id = Auth::id();

        $user = UserModel::find($id);
        $danhgia = \App\Models\DanhGia::where('user_id', '=', $data->_id)->where('thang_id', '=', $thang_id)->first();
        if (!count($danhgia)) {
            $danhgia = self::getDanhGiaTaiKhoanThang($data->_id, $thang_id);

        }
        if ($self == 1) {
            $danhgia->tudanhgia = abs($danhgia->tudanhgia - 1);
            $danhgia->save();
            return;
        }
        if ($user->vaitro_id == config('vaitro.TruongBan') || $user->vaitro_id == config('vaitro.PhoTruongBan')) {
            $danhgia->bandanhgia = abs($danhgia->bandanhgia - 1);
        } elseif ($user->vaitro_id == config('vaitro.TruongPhong') || $user->vaitro_id == config('vaitro.PhoTruongPhong')) {
            $danhgia->phongdanhgia = abs($danhgia->phongdanhgia - 1);
        } else {

            $danhgia->tudanhgia = abs($danhgia->tudanhgia - 1);
        }
        $danhgia->save();
        return;
    }

    public static function applyRate($user_id, $thang_id, $un_apply)
    {
        $danhgia = \App\Models\DanhGia::where('user_id', '=', $user_id)->where('thang_id', '=', $thang_id)->first();
        if (!count($danhgia)) {
            $danhgia = self::getDanhGiaTaiKhoanThang($user_id, $thang_id);
        }
        if (VaiTro::getEditBan()) {
            $danhgia->bandanhgia = 1;
            if ($un_apply == 1)
                $danhgia->bandanhgia = 0;
        }elseif(VaiTro::getEditPhong()){
            $danhgia->phongdanhgia = 1;
            if ($un_apply == 1)
                $danhgia->phongdanhgia = 0;
        }
        $danhgia->save();
        return;


    }

    public static function getStatusRate($thang_id)
    {
        $data = \Session::get('staffData');
        if (!isset($data))
            return 0;
        if (!auth()->check())
            return 9;
        $id = Auth::id();
        $user = UserModel::find($id);
        $danhgia = \App\Models\DanhGia::where('user_id', '=', $data->_id)->where('thang_id', '=', $thang_id)->first();
        if (!count($danhgia))
            return 0;
        if ($user->vaitro_id == config('vaitro.TruongBan') || $user->vaitro_id == config('vaitro.PhoTruongBan')) {
            return $danhgia->bandanhgia;
        } elseif ($user->vaitro_id == config('vaitro.TruongPhong') || $user->vaitro_id == config('vaitro.PhoTruongPhong')) {
            return $danhgia->phongdanhgia;
        } else {
            return $danhgia->tudanhgia;
        }
    }

    public static function isUpdateDanhGia($thang_id)
    {
        $data = \Session::get('staffData');
        if (!isset($data))
            return 0;
        if (!auth()->check())
            return 0;
        $id = Auth::id();
        $user = UserModel::find($id);
        $danhgia = \App\Models\DanhGia::where('user_id', '=', $data->_id)->where('thang_id', '=', $thang_id)->first();
        if (!count($danhgia)) {
            $danhgia = self::getDanhGiaTaiKhoanThang($data->_id, $thang_id);
        }
        if ($danhgia->bandanhgia == 1)
            return 1;
        if ($user->vaitro_id == config('vaitro.TruongBan') || $user->vaitro_id == config('vaitro.PhoTruongBan')) {
            return $danhgia->bandanhgia;
        } elseif ($user->vaitro_id == config('vaitro.TruongPhong') || $user->vaitro_id == config('vaitro.PhoTruongPhong')) {
            return $danhgia->phongdanhgia;
        } else {
            if ($danhgia->phongdanhgia == 0)
                return $danhgia->tudanhgia;
            else
                return $danhgia->phongdanhgia;
        }

    }

    public static function ketQuaDanhGia($id, $thang_id)
    {
        $data = [];
        $chuyenmon = Calculator::getDiemChuyenMon($id, $thang_id);
        if ($chuyenmon["bancham"] > 0) {
            $kyluat = Calculator::getDiemKyLuat($id, $thang_id);
            $tiendo = Calculator::getDiemTienDo($id, $thang_id);
            $chatluong = Calculator::getDiemChatLuong($id, $thang_id);
            $phamchat = Calculator::getDiemPhamChat($id, $thang_id);
            $donggop = Calculator::getDiemDongGop($id, $thang_id);
            $data['chuyenmon'] = $chuyenmon["bancham"];
            $data['chatluong'] = $chatluong["bancham"];
            $data['tiendo'] = $tiendo["bancham"];
            $data['phamchat'] = $phamchat["bancham"];
            $data['kyluat'] = $kyluat["bancham"];
            $data['donggop'] = $donggop["bancham"];
            $data['tongdiem'] =
                $chuyenmon["bancham"] + $tiendo["bancham"] + $donggop["bancham"] + $chatluong["bancham"] + $kyluat["bancham"] + $phamchat["bancham"];
            $data['xeploai'] = XepLoai::BanXepLoai($thang_id, $id, $data['tongdiem']);
            $ghichu = "";
            $ghichu = self::addString($ghichu, $chuyenmon["ghichu"]);
            $ghichu = self::addString($ghichu, $tiendo["ghichu"]);
            $ghichu = self::addString($ghichu, $chatluong["ghichu"]);
            $ghichu = self::addString($ghichu, $kyluat["ghichu"]);
            $ghichu = self::addString($ghichu, $phamchat["ghichu"]);
            $ghichu = self::addString($ghichu, $donggop["ghichu"]);
            $data['ghichu'] = $ghichu;

        } else {
            $data['chuyenmon'] = 0;
            $data['chatluong'] = 0;
            $data['tiendo'] = 0;
            $data['phamchat'] = 0;
            $data['kyluat'] = 0;
            $data['donggop'] = 0;
            $data['tongdiem'] = 0;
            $data['xeploai'] = "";
            $data['ghichu'] = 'Chưa Đánh Giá';
        }
        return $data;
    }

    public static function getIsBanDanhGia($thang_id)
    {
        $userInfo = \Session::get('staffData');
        if (!$userInfo)
            return false;
        $data = \App\Models\DanhGia::where('thang_id', '=', $thang_id)->where('user_id', '=', $userInfo->_id)->first();
        if (!count($data))
            return true;
        else {
            if (isset($data->bandanhgia) && $data->bandanhgia == 1)
                return false;
            return true;
        }
    }

    public static function addString($a, $b)
    {
        if (strlen($a) > 0 && strlen($b) > 0)
            return $a . "; " . $b;
        if (strlen($a) > 0)
            return $a;
        else
            return $b;
    }

}