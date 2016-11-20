<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;
use Config;
use App\Helpers\User;

class Auth
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            if ('login' == $request->segment(2))
                return $next($request);
            if ('rates' == $request->segment(1))
                return $next($request);
            if ('my-acount' == $request->segment(1))
                return $next($request);
            $menus = \App\Helpers\Menu::getMenu();
            if (isset($menus) && count($menus > 0)) {
                foreach ($menus as $key => $value) {
                    if ($key == $request->segment(1))
                        return $next($request);
                }
            }
            return new RedirectResponse(url('/users/login'));
        } catch (\Exception $e) {
//            return new RedirectResponse(url('/users/login'));
        }
    }
}
