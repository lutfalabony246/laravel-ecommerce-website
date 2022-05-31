<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // dd($request->all());
        if (! $request->expectsJson()) {
            if(request()->is('admin/*'))
            {
                return route('admin.login');
            }
            // if(request()->is('super-admin/*'))
            // {
            //     return route('superAdmin.login');
            // }
            if(request()->is('employeer/*'))
            {
                return route('employeer.loginForm');
            }

            return route('user.index');
        }
    }
}
