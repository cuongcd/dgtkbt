<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 4/29/16
 * Time: 3:31 PM
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;



class DongGopTaiKhoanThang extends Eloquent
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'donggop_id','diemtru','dg_tutru','dg_phongtru','dg_bantru','thang_id','ghichu','user_id'];

    public static function rules($id = null)
    {
        return $rules = [
            'name' => 'required',
        ];
    }

    protected $table = 'donggop_taikhoan_thang';
    protected $primaryKey = '_id';

}