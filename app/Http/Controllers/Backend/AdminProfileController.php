<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{

    // admin profile view
    public function AdminProfile()
    {
        $id = Auth::guard('admin')->user()->id;
        $adminData = Admin::find($id);

        // $id = Auth::guard('admin')->user()->id;
        // dd($id);
        return view('admin.admin_profile_view', compact('adminData'));
    }


    // admin profile edit
    public function AdminProfileEdit()
    {
        $id = Auth::guard('admin')->user()->id;
        $editData = Admin::find($id);

        return view('admin.admin_profile_edit', compact('editData'));
    }


    // admin profile Update
    public function AdminProfileStore(Request $request)
    {

        $id = Auth::guard('admin')->user()->id;

        $data = Admin::find($id);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();
        // update sms
        $notification = array(
            'message' =>  'Admin Profie Update Sucessyfuly',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.admin_profile_view')->with($notification);
    }
    public function AdminChangePassword()
    {

        return view('admin.admin_change_password');
    }

    // admin password update
    public function AdminUpdateChangePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::guard('admin')->user()->password;
        // dd($hashedPassword);
        if (Hash::check($request->oldpassword, $hashedPassword)) {

            $admin = Admin::find(Auth::guard('admin')->user()->id);
            $admin->password = Hash::make($request->password);
            // dd($request->$admin->password);
            $admin->save();
            Auth::logout();

            // return redirect()->route('admin.logout');
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back();
        }
    } // end method


    // show all register user
    public function AllUsers()
    {
        $users = User::latest()->get();
        return view('backend.user.all_user', compact('users'));
    } // end method


    // show all register user
    public function show($role, $id)
    {
        $show = User::find($id);
        return view('backend.user.all_user_show', compact('show'));
    } // end method


} // main end
