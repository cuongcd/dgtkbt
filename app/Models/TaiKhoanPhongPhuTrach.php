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



class TaiKhoanPhongPhuTrach extends Eloquent
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['user_id', 'room_id'];

    public static function rules($id = null)
    {
        return $rules = [
            'user_id' => 'required',
            'room_id' => 'required',
        ];
    }

    protected $table = 'taikhoan_phongphutrach';
    protected $primaryKey = '_id';

}