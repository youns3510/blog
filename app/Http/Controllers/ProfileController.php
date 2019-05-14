<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Session;

class ProfileController extends Controller
{

    public function edit()
    {
        $user = Auth::user();
        return view('admin.setting.profile')->with('user', $user);
    }


    public function update(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email'. $user->id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about' => 'required|string',
            'facebook' => 'required|url',
            'youtube' => 'required|url',
            'linkedin' => 'required|url',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();


        $user->profile->about = $request->about;
        $user->profile->facebook = $request->facebook;
        $user->profile->youtube = $request->youtube;
        $user->profile->linkedin = $request->linkedin;
        $user->profile->save();

        if ($request->hasFile('avatar')) {
            $featured = $request->avatar;
            $featured_new_name = time() . $featured->getClientOriginalName();
            $featured->move('uploads/avatars', $featured_new_name);
            $user->profile->avatar = '/uploads/avatars/' . $featured_new_name;
            $user->profile->save();
            Session::flash('success', "Profile Updated Successfully");
        }

        if ($request->has('old_password')) {
            $this->validate($request, [
                'old_password' => 'required_with:password,password_confirmation',
                'password' => 'nullable|required_with:password_confirmation|string|min:6|confirmed',

            ]);
       //dd($request->old_password,$user->password,Hash::check($request->old_password, $user->password),$request->password,$request->password_confirmation,$request->password == $request->password_confirmation);
            if ($request->old_password) {               
                if (!Hash::check($request->old_password, $user->password)) {
                    Session::flash('error', 'Old Password is wrong');
                } elseif ($request->password !== $request->password_confirmation) {
                    Session::flash('error', 'Password  and confirmation do not match');
                } else {
                    $user->password = bcrypt($request->password);
                    $user->save();
                    
                    Session::flash('success', "Profile Updated Successfully");
                    
                }
            }
        }
        Session::flash('success', "Profile Updated Successfully");
        return redirect()->back();
    }
}
