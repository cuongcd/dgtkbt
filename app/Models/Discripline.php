<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 5/8/16
 * Time: 12:25 PM
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discripline extends  Eloquent
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'level_id','chucdanh_id','room_id','diemtru'];

    public static function rules($id = null)
    {
        return $rules = [
            'name' => 'required',
        ];
    }

    protected $table = 'kyluat';
    protected $primaryKey = '_id';
}