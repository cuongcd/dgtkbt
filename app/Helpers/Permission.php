<?php
namespace App\Helpers;

use App\Models\Lang;
use App;
use DB;
class Permission
{
    /**
     * Get list permissions
     */
    public static function getAllPermissions()
    {
        $categories = DB::table('permission')
            ->where('permission.deleted_at', '=', null)
            ->select('permission._id as id', 'permission.name as text')->get();

        $arr = [];
        $i = 0;
        foreach ($categories as $category) {
            $arr[$i]['id'] = (string)$category->id;
            $arr[$i]['parent'] = "#";
            $arr[$i]['text'] = $category->text;
            $i++;
        }
        return json_encode($arr);
    }
}