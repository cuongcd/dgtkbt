<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 5/8/16
 * Time: 10:02 AM
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Progress extends Eloquent
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

    protected $table = 'tiendo';
    protected $primaryKey = '_id';
}