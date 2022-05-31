<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        $guard = config('fortify.guard');
        // dd($guard);
        $path = "/";
        if($guard == 'admin'){
            $path = '/admin/dashboard';
        }
        elseif($guard  == 'employeer'){
            $path = '/employeer/dashboard';
        }

        return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect()->intended($path);
                    // return $request->wantsJson()
                    // ? response()->json(['two_factor' => false])
                    // : redirect()->intended('employeer/dashboard');
    }
}
