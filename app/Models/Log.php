<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;


class Log extends Eloquent
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	protected $fillable = ['ip', 'mac', 'agent', 'app_version_name', 'app_version_code', 'db_version', 'language',
		'song_id', 'action_type', 'action_value'];

	public static function rules($id = null)
	{
		return $rules = [
		];
	}

	protected $table = 'log';
	protected $primaryKey = '_id';


}