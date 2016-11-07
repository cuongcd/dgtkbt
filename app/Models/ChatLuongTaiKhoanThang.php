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



class ChatLuongTaiKhoanThang extends Eloquent
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'chatluong_id','diemtru','cl_tutru','cl_phongtru','cl_bantru','thang_id','ghichu','user_id'];

    public static function rules($id = null)
    {
        return $rules = [
            'name' => 'required',
        ];
    }

    protected $table = 'chatluong_taikhoan_thang';
    protected $primaryKey = '_id';

}