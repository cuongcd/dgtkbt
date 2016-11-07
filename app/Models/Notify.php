<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notify extends Eloquent
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'status','description','seq_no'];

    public static function rules($id = null)
    {
        return $rules = [
//            'name' => 'required',
        ];
    }

    protected $table = 'role';
    protected $primaryKey = '_id';
}
