<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Auth;
use Session;
use App\Helpers\Language as HelperLanguage;

class Language
{

    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (!Session::has('chosen_language')) {
                Session::put('chosen_language', 'en');
            }
            if (!Session::has('languages')) {
                Session::put('languages', HelperLanguage::getLanguages());
            }
            App::setLocale(Session::get('chosen_language'));
        }
        return $next($request);
    }
}
