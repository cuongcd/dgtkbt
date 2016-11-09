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



class Point extends Eloquent
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'diem','description',];

    public static function rules($id = null)
    {
        return $rules = [
            'name' => 'required',
            'diem'  => 'required'
        ];
    }

    protected $table = 'xeploai';
    protected $primaryKey = '_id';

}