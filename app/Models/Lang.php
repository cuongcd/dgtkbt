<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lang extends Eloquent
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'user_id', 'status', 'code', 'url'];

    public static function rules($id = null)
    {
        return $rules = [
            'name' => 'required',
            'code' => 'unique:langs' . ($id ? ",code,$id,_id" : ""),
        ];
    }

    protected $table = 'langs';
    protected $primaryKey = '_id';
    protected $hidden = ['deleted_at'];
}
