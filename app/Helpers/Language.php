<?php namespace App\Helpers;

use App\Models\Lang;
use App;

class Language
{
    public static function getLanguages($all = null)
    {
        if (App::bound('languages'))
            return App::make('languages');
        if ($all) {
            $arr['all'] = 'All';
        } else {
            $arr = [];
        }

        $languages = Lang::where('status', '=', 1)->get(['code', 'name', 'url'])->toArray();
        foreach ($languages as $language) {
            $arr[$language['code']] = $language['name'];
        }
        App::instance('languages', $arr);
        return $arr;
    }
}