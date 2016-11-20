<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 5/6/16
 * Time: 6:42 PM
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;


class Mvp extends Eloquent
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['user_id','thang_id','ghichu','nguoidexuat_id'];

    public static function rules($id = null)
    {
        return $rules = [
            'user_id' => 'required',
            'thang_id' => 'required',
            'ghichu'    => 'required',
        ];
    }

    protected $table = 'nv_tieubieu_thang';
    protected $primaryKey = '_id';


}