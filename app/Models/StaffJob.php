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



class StaffJob extends Eloquent
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'chuyenmon_id','heso','macdinh','khoiluong','nguoigiao','ghichu','user_id','thang_id'];

    public static function rules($id = null)
    {
        return $rules = [
            'name' => 'required',
        ];
    }

    protected $table = 'congviec_taikhoan_thang';
    protected $primaryKey = '_id';
    public function users(){
        return $this->hasMany('User');
    }

}