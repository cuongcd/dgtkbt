<?php
/**
 * Created by PhpStorm.
 * User: cuongdc
 * Date: 5/16/16
 * Time: 11:14 AM
 */

namespace App\Helpers;

use DB;

class Calculator
{
    public static function getDiemChuyenMon($user_id, $thang_id)
    {
        $model = DB::table('congviec_taikhoan_thang')
            ->where('user_id', '=', $user_id)
            ->where('thang_id', '=', $thang_id)
            ->where('deleted_at', '=', null)
            ->select('*', '_id');
        $total = $model->count();
        $rows = $model->get();
        $result = [];
        if ($total <= 0) {
            $result["tucham"] = 0;
            $result["phongcham"] = 0;
            $result["bancham"] = 0;
            $result["ghichu"] = "";
            return $result;
        }
        $khoiLuong = 0;
        $thuchien = 0;
        $phongcham = 0;
        $bancham = 0;
        $ghichu = "";
        foreach ($rows as $key => $value) {
            $khoiLuong = $khoiLuong + $value->heso * $value->khoiluong;
            $thuchien = $thuchien + $value->heso * $value->cv_tudanhgia;
            $phongcham = $phongcham + $value->heso * $value->cv_phongdanhgia;
            $bancham = $bancham + $value->heso * $value->cv_bandanhgia;
            if (strlen($value->ghichu) > 3)
                $ghichu = $ghichu . $value->ghichu . "; ";

        }
        if($khoiLuong <=0)
        {
            $result["tucham"] = 0;
            $result["phongcham"] = 0;
            $result["bancham"] = 0;
            $result["ghichu"] = "";
            return $result;
        }
        $result["tucham"] = 30 * $thuchien / $khoiLuong <=30 ?round(30*$thuchien/$khoiLuong,2):30;
        $result["phongcham"] = 30 * $phongcham / $khoiLuong<=30 ?round(30*$phongcham/$khoiLuong,2):30;
        $result["bancham"] = 30 * $bancham / $khoiLuong <=30 ?round(30*$bancham/$khoiLuong,2):30;
        $result["ghichu"] = $ghichu;
        return $result;

    }

    public static function getDiemTienDo($user_id, $thang_id)
    {
        $model = DB::table('tiendo_taikhoan_thang')
            ->where('user_id', '=', $user_id)
            ->where('thang_id', '=', $thang_id)
            ->where('deleted_at', '=', null)
            ->select('*', '_id');
        $total = $model->count();
        $rows = $model->get();
        $result = [];
        if ($total <= 0) {
            $result["tucham"] = 10;
            $result["phongcham"] = 10;
            $result["bancham"] = 10;
            $result["ghichu"] = "";
            return $result;
        }
        $thuchien = 10;
        $phongcham = 10;
        $bancham = 10;
        $ghichu = "";
        foreach ($rows as $key => $value) {
            $thuchien = $thuchien - $value->td_tutru;
            $phongcham = $phongcham - $value->td_phongtru;
            $bancham = $bancham - $value->td_bantru;
            $ghichu = $ghichu . $value->name . "; ";
            if (strlen($value->ghichu) > 3)
                $ghichu = $ghichu . $value->ghichu . "; ";
        }
        $result["tucham"] = $thuchien;
        $result["phongcham"] = $phongcham;
        $result["bancham"] = $bancham;
        $result["ghichu"] = $ghichu;
        return $result;
    }

    public static function getDiemChatLuong($user_id, $thang_id)
    {
        $model = DB::table('chatluong_taikhoan_thang')
            ->where('user_id', '=', $user_id)
            ->where('thang_id', '=', $thang_id)
            ->where('deleted_at', '=', null)
            ->select('*', '_id');
        $total = $model->count();
        $rows = $model->get();
        $ghichu = "";
        $result = [];
        if ($total <= 0) {
            $result["tucham"] = 30;
            $result["phongcham"] = 30;
            $result["bancham"] = 30;
            $result["ghichu"] = "";
            return $result;
        }
        $thuchien = 30;
        $phongcham = 30;
        $bancham = 30;
        foreach ($rows as $key => $value) {
            $thuchien = $thuchien - $value->cl_tutru;
            $phongcham = $phongcham - $value->cl_phongtru;
            $bancham = $bancham - $value->cl_bantru;
            $ghichu = $ghichu . $value->name . "; ";
            if (strlen($value->ghichu) > 3)
                $ghichu = $ghichu . $value->ghichu . "; ";
        }
        $result["tucham"] = $thuchien;
        $result["phongcham"] = $phongcham;
        $result["bancham"] = $bancham;
        $result["ghichu"] = $ghichu;
        return $result;
    }

    public static function getDiemPhamChat($user_id, $thang_id)
    {
        $model = DB::table('phamchat_taikhoan_thang')
            ->where('user_id', '=', $user_id)
            ->where('thang_id', '=', $thang_id)
            ->where('deleted_at', '=', null)
            ->select('*', '_id');
        $total = $model->count();
        $rows = $model->get();
        $ghichu = "";
        $result = [];
        if ($total <= 0) {
            $result["tucham"] = 5;
            $result["phongcham"] = 5;
            $result["bancham"] = 5;
            $result["ghichu"] = "";
            return $result;
        }
        $thuchien = 5;
        $phongcham = 5;
        $bancham = 5;
        foreach ($rows as $key => $value) {
            $thuchien = $thuchien - $value->pc_tutru;
            $phongcham = $phongcham - $value->pc_phongtru;
            $bancham = $bancham - $value->pc_bantru;
            $ghichu = $ghichu . $value->name . "; ";
            if (strlen($value->ghichu) > 3)
                $ghichu = $ghichu . $value->ghichu . "; ";
        }
        $result["tucham"] = $thuchien;
        $result["phongcham"] = $phongcham;
        $result["bancham"] = $bancham;
        $result["ghichu"] = $ghichu;
        return $result;
    }

    public static function getDiemDongGop($user_id, $thang_id)
    {
        $model = DB::table('donggop_taikhoan_thang')
            ->where('user_id', '=', $user_id)
            ->where('thang_id', '=', $thang_id)
            ->where('deleted_at', '=', null)
            ->select('*', '_id');
        $total = $model->count();
        $rows = $model->get();
        $ghichu = "";
        $result = [];
        if ($total <= 0) {
            $result["tucham"] = 0;
            $result["phongcham"] = 0;
            $result["bancham"] = 0;
            $result["ghichu"] = "";
            return $result;
        }
        $thuchien = 0;
        $phongcham = 0;
        $bancham = 0;
        foreach ($rows as $key => $value) {
            $thuchien = $thuchien + $value->dg_tucong;
            $phongcham = $phongcham + $value->dg_phongcong;
            $bancham = $bancham + $value->dg_bancong;
            $ghichu = $ghichu . $value->name . "; ";
            if (strlen($value->ghichu) > 3) {
                $ghichu = $ghichu . $value->ghichu . "; ";
            }

        }
        $result["tucham"] = $thuchien;
        $result["phongcham"] = $phongcham;
        $result["bancham"] = $bancham;
        $result["ghichu"] = $ghichu;
        return $result;
    }

    public static function getDiemKyLuat($user_id, $thang_id)
    {
        $model = DB::table('kyluat_taikhoan_thang')
            ->where('user_id', '=', $user_id)
            ->where('thang_id', '=', $thang_id)
            ->where('deleted_at', '=', null)
            ->select('*', '_id');
        $total = $model->count();
        $rows = $model->get();
        $ghichu = "";
        $result = [];
        if ($total <= 0) {
            $result["tucham"] = 15;
            $result["phongcham"] = 15;
            $result["bancham"] = 15;
            $result["ghichu"] = "";
            return $result;
        }
        $thuchien = 15;
        $phongcham = 15;
        $bancham = 15;
        foreach ($rows as $key => $value) {
            $thuchien = $thuchien - $value->kl_tutru;
            $phongcham = $phongcham - $value->kl_phongtru;
            $bancham = $bancham - $value->kl_bantru;
            $ghichu = $ghichu . $value->name . "; ";
            if (strlen($value->ghichu) > 3)
                $ghichu = $ghichu . $value->ghichu . "; ";
        }
        $result["tucham"] = $thuchien;
        $result["phongcham"] = $phongcham;
        $result["bancham"] = $bancham;
        $result["ghichu"] = $ghichu;
        return $result;
    }


}