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



class TienDoTaiKhoanThang extends Eloquent
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'tiendo_id','diemtru','td_tutru','td_phongtru','td_bantru','thang_id','ghichu'];

    public static function rules($id = null)
    {
        return $rules = [
            'name' => 'required',
        ];
    }

    protected $table = 'tiendo_taikhoan_thang';
    protected $primaryKey = '_id';
    public function users(){
        return $this->hasMany('User');
    }

}