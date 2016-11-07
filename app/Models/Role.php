<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Eloquent
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'status','description'];

    public static function rules($id = null)
    {
        return $rules = [
//            'name' => 'required',
        ];
    }

    protected $table = 'vaitro';
    protected $primaryKey = '_id';
}
