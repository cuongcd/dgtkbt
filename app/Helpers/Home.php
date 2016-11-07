<?php namespace App\Helpers;

use App\Models\Lang;
use App;
use DB;
use Session;

class Home
{
    public static function getLanguages()
    {
        if (App::bound('languages_home'))
            return App::make('languages_home');
        $arr = [];
        $languages = Lang::where('status', '=', 1)->get(['code', 'name', 'url'])->toArray();
        foreach ($languages as $language) {
            $arr[$language['code']]['name'] = $language['name'];
            $arr[$language['code']]['url'] = $language['url'];
        }
        App::instance('languages_home', $arr);
        return $arr;
    }

    /**
     * get menu from data base
     */
    public function getMenu()
    {
        if (App::bound('menus'))
            return App::make('menus');
        $model = DB::table('menu')
            ->join('menu_content', 'menu._id', '=', 'menu_content.menu_id')
            ->where('menu.deleted_at', '=', null)
            ->where('menu.status', '=', 1)
            ->where('menu_content.lang_id', '=', Session::get('chosen_language_font'))
            ->orderBy('order', 'asc')
            ->select('*', 'menu._id')
            ->get();
        App::instance('menus', $model);
        return $model;
    }

    /**
     * get setting content
     * @return array|mixed
     */
    public function getHeader()
    {
        if (App::bound('headers'))
            return App::make('headers');
        $model = App\Models\Setting::firstOrCreate([])->toArray();
        App::instance('headers', $model);
        return $model;
    }

    /**
     * get slide
     * @param $position
     * @return null
     */
    public function getSlide($position)
    {
        $model = App\Models\Slide::where('position', '=', $position)
            ->where('status', '=', 1)
            ->where('deleted_at', '=', null)
            ->where('lang_id', '=', Session::get('chosen_language_font'))
            ->orwhere('position', '=', $position)
            ->where('status', '=', 1)
            ->where('deleted_at', '=', null)
            ->Where('lang_id', '=', 'all')
            ->first();
        if ($model) {
            $gallery = $model->gallery;
            $image = $gallery->image()->orderBy('order', 'asc');
            return $image->get()->toArray();
        }
        return null;
    }

    /**
     * get recent post
     * @return array|static[]
     */
    public function getRecentPost()
    {
        $model = DB::table('posts')
            ->join('post_content', 'posts._id', '=', 'post_content.post_id')
            ->where('posts.status', '=', 1)
            ->where('post_content.lang_id', '=', Session::get('chosen_language_font'))
            ->where('posts.deleted_at', '=', null)
            ->orderBy('posts.updated_at', 'desc')
            ->select('*', 'posts._id')
            ->take(5)
            ->get();
        return $model;
    }


    /**
     * get all post by categories
     * @return array
     */
    public function getPostByCategories()
    {
        $categories = App\Models\Category::where('status', '=', 1)->get();
        foreach ($categories as $category) {
            $cat_content = $category->cat_lang->toArray();
            $posts = $category->page;
            foreach ($posts as $post) {
                $post_content = $post->post_content->toArray();
            }
        }
        return $categories->toArray();
    }

    /**
     * get post by slug
     * @param $slug
     * @return string
     */
    public function getPostBySlug($slug)
    {
        $model = App\Models\PostLang::where('slug', '=', $slug)
            ->where('lang_id', '=', Session::get('chosen_language_font'))
            ->first();
        if (!$model)
            return null;
        return $model->toArray();
    }

    /**
     * get all post in one category
     * get by category id
     * @param $id
     * @param $number
     * @return array
     */
    public function getAllPostInCategory($id, $number)
    {
        $category = App\Models\Category::find($id);
        $cat_name = $category->cat_lang()->where('lang_id', '=', Session::get('chosen_language_font'))
            ->first(['name'])
            ->toArray();
        $cat_name['_id'] = $id;
        $posts = $category->page()->where('status', '=', 1)->paginate($number);
        $post_content = [];
        foreach ($posts as $post) {
            $temp = $post->post_content()->where('lang_id', '=', Session::get('chosen_language_font'))
                ->first();
            if (!empty($temp))
                $post_content[] = $temp->toArray();
        }
        return ['cat_name' => $cat_name, 'posts' => $post_content, 'paginate' => $posts];
    }

    /**
     * get random post
     * @param $number
     */
    public function randomPost($number)
    {
        $posts = App\Models\PostLang::where('lang_id', '=', Session::get('chosen_language_font'))
            ->take($number)
            ->get(['slug', 'title']);
        return $posts->toArray();
    }

}