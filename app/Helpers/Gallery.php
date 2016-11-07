<?php namespace App\Helpers;

use App\Models\Gallery as GalleryModel;
use App;

class Gallery
{
    public static function getGallery($type = 0)
    {
        if (App::bound('gallery'))
            return App::make('gallery');
        $arr = [];
        $galleries = GalleryModel::where('status', '=', 1)
            ->whereIn('type', [0, $type])
            ->get(['_id', 'name'])
            ->toArray();
        foreach ($galleries as $gallery) {
            $arr[$gallery['_id']] = $gallery['name'];
        }
        App::instance('gallery', $arr);
        return $arr;
    }
}