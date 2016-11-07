<?php
/**
 * Created by PhpStorm.
 * User: cuongdc
 * Date: 4/21/16
 * Time: 11:33 AM
 */
namespace App\Helpers;

use App\Models\Role as ModelClass;
use App;
use DB;
class Role
{
    /**
     * Get list permissions
     */
    public static function getListRoles()
    {
        $data = ModelClass::all();
        if (isset($data['errors'])) {
            return [];
        }
        $tmp = [];
        foreach($data as $key=> $value){
            $tmp[$value["_id"]] = $value["name"];
        }
        return $tmp;
    }
}