<?php

namespace App\Http\Controllers;

use Input;
use Session;

class LanguageController extends Controller
{
    public function setSessionLanguage()
    {
        $language = Input::get('lang');
        if ($language == "") {
            $language = 'en';
        }
        Session::put('chosen_language', $language);
    }

    public function setSessionLanguageFont()
    {
        $language = Input::get('lang');
        if ($language == "") {
            $language = 'en';
        }
        Session::put('chosen_language_font', $language);
    }
}
