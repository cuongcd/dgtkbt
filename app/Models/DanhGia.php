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



class DanhGia extends Eloquent
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['thang_id','user_id','tudanhgia','phongdanhgia','bandanhgia'];

    public static function rules($id = null)
    {
        return $rules = [
            'name' => 'required',
        ];
    }

    protected $table = 'danhgia';
    protected $primaryKey = '_id';

}