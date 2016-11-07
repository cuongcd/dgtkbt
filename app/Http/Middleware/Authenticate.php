<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;

class Authenticate
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
        if ($request->segment(1) == 'images') {
            return $next($request);
        }

        if (  !in_array($request->segment(1), ['users','/'])   || !in_array($request->segment(2), [
                'login', 'fail-login', 'register', 'create', 'recover-password', 'sso-login-callback',
                'reset-password','index'
            ])
        ) {
            if ($this->auth->guest()) {
                if ($request->ajax()) {
                    return response('Unauthorized.', 401);
                }
                return new RedirectResponse(url('/users/login'));
            }
        }
        return $next($request);
    }
}
