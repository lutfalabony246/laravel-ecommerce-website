<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisteredUserController;

class RegisteredUserController extends Controller
{

    public function store(Request $request){

    $request->validate([
        //  'name' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        // 'phone' => '|digits:10',
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'password_confirmation' => 'required_with:password|same:password|min:6'
    ]);

    $user = User::create([
        // 'name' => $request->name,
        'name' => $request->name,
        'email' => $request->email,
        // 'phone' => $request->phone,
        'password' => Hash::make($request->password),

    ]);

    }
}
?>


