<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 5/14/16
 * Time: 5:09 PM
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;



class PhamChatTaiKhoanThang extends Eloquent
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'phamchat_id','diemtru','pc_tutru','pc_phongtru','pc_bantru','thang_id','ghichu','user_id'];

    public static function rules($id = null)
    {
        return $rules = [
            'name' => 'required',
        ];
    }

    protected $table = 'phamchat_taikhoan_thang';
    protected $primaryKey = '_id';


}