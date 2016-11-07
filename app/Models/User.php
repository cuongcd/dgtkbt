<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Eloquent implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;


    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['email', 'password', 'isAdmin', 'first_name', 'last_name', 'note', 'phone','status','username','room_id','level_id','chucdanh_id','vaitro_id'];

    protected $table = 'users';

    protected $primaryKey = '_id';

    protected $hidden = array('password', 'remember_token');

    public static function rules($id = null)
    {
        return $rules = [
            'email' => "required|email|max:255|unique:users" . ($id ? ",email,$id,_id,deleted_at,NULL" : ",deleted_at,NULL")
        ];
    }


    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($remember_token)
    {
        $this->remember_token = $remember_token;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function isAdmin()
    {
        return $this->isAdmin() == 1;
    }

    public function roles(){
        return $this->belongsToMany('App\Models\Role', 'user_role', 'user_id', 'role_id');
    }

}

