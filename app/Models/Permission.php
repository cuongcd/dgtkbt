<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Eloquent
{

	use SoftDeletes;
	protected $dates = ['deleted_at'];

	protected $fillable = ['name', 'description', 'status'];

	public static function rules($id = null)
	{
		return $rules = [
		];
	}

	protected $table = 'permission';
	protected $primaryKey = '_id';

	public function roles(){
		return $this->belongsToMany('App\Models\Role', 'role_permission', 'permission_id', 'role_id');
	}
}