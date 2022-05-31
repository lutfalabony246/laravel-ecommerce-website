<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LogoutResponse as LogoutResponseContract;

class LogoutResponse implements LogoutResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        // dd(config('fortify.guard'));

        $guard = config('fortify.guard');
        $path = "/";
        if($guard == 'admin'){
            $path = '/admin/login';
        }
        elseif($guard  == 'employeer'){
            $path = '/employeer/login';
        }

        return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect()->intended($path);
        // return $request->wantsJson()
        // ? response()->json(['two_factor' => false])
        // : redirect()->intended('employeer/dashboard');
    }
}
