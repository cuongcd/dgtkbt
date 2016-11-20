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



class TaiKhoanViTriLamViec extends Eloquent
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['user_id', 'vitrilamviec_id'];

    public static function rules($id = null)
    {
        return $rules = [
            'user_id' => 'required',
            'vitrilamviec_id' => 'required',
        ];
    }

    protected $table = 'taikhoan_vitrilamviec';
    protected $primaryKey = '_id';

}