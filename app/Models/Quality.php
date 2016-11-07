<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 5/8/16
 * Time: 11:22 AM
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quality extends Eloquent
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

    protected $table = 'chatluong';
    protected $primaryKey = '_id';
}