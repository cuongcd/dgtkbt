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


class Work extends Eloquent
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'level_id','chucdanh_id','room_id','heso','macdinh'];

    public static function rules($id = null)
    {
        return $rules = [
            'name' => 'required',
        ];
    }

    protected $table = 'chuyenmon';
    protected $primaryKey = '_id';


}