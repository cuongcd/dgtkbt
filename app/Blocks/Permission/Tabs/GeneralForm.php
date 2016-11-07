<?php

namespace App\Blocks\Permission\Tabs;

use App\Blocks\BaseForm;
use DB;
use Session;

class GeneralForm extends BaseForm
{

    public function html($id = null)
    {
        return view('role.general', ['pages' => $this->_data, 'categories' => $this->getAllCategories()]);
    }

    /**
     * Get categories by session
     */
    public function getAllCategories()
    {
        $categories = DB::table('categories')
            ->join('cat_content', 'categories._id', '=', 'cat_content.cat_id')
            ->where('cat_content.lang_id', '=', Session::get('chosen_language'))
            ->where('cat_content.deleted_at', '=', null)
            ->select('categories._id as id', 'categories.parent_id as parent', 'cat_content.name as text')->get();

        $arr = [];
        $i = 0;
        foreach ($categories as $category) {
            $arr[$i]['id'] = (string)$category->id;
            if ($category->parent == 0) {
                $arr[$i]['parent'] = "#";
            } else {
                $arr[$i]['parent'] = (string)$category->parent;
            }
            $arr[$i]['text'] = $category->text;
            $i++;
        }
        return json_encode($arr);
    }
}