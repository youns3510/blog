<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Auth;
use Session;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function permission(User $user)
    {
        $usr = Auth::user();
        if ($usr == $user && $user->admin) {
            Session::flash('warning', "You can't change your permissions");
        } else {
            if ($user->admin) {
                $user->admin = 0;
            } else {
                $user->admin = 1;
            }

            $user->save();

            Session::flash('success', "Permission changed successfully");
        }



        return redirect()->back();
    }
    public function index()
    {
        return view('admin.user.index')->with('users', User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => "required|string",
            'email' => 'required|email',

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password'),

        ]);
        $pro = new Profile;
        $pro->user()->associate($user)->save();
        Session::flash('success', 'User Created Successfully');
        return redirect()->back();
    }


 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => "required|string",
            'email' => 'required|email',

        ]);

        $user->name = $request->name;
        $user->email = $request->email;


        $user->save();
        Session::flash('success', 'User Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $usr = Auth::user();
        if ($usr != $user) {
            $user->delete();
            Session::flash('success', 'User deleted Successfully');
        } else {     
            Session::flash('success', "Permission changed successfully");
            Session::flash('warning', "You Can't delete your account");
        }

        return redirect()->back();
    }
    public function trash()
    {
        $users = User::onlyTrashed()->get();
        return view('admin.user.trash')->with('users', $users);
    }

    public function hdelete($id) //hard delete //delete forever
    {


        $user = User::withTrashed()->where('id', $id)->first();
        $user->forceDelete();
        Session::flash('success', 'User deleted Successfully');
        return redirect()->back();
    }

    public function user_restore($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();
        $user->restore();
        Session::flash('success', 'User restored Successfully');

        return redirect()->back();
    }
}
