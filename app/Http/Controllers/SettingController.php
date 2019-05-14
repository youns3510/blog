<?php

namespace App\Http\Controllers;

use App\Setting;
use Session;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
  
    public function edit()
    {
       return view('admin.setting.site')->with('setting',Setting::first());
    }


    
    public function update(Request $request)
    {
        $this->validate($request,[
            'site_name'=>'required|string',
            'contact_number'=>'required|string',
            'contact_email'=>'required|email',
            'address'=>'required|string'
        ]);
        $setting=Setting::first();
        $setting->site_name= $request->site_name;
        $setting->contact_number=$request->contact_number;
        $setting->contact_email=$request->contact_email;
        $setting->address=$request->address;
        $setting->save();
        Session::flash('success','Settings Updated Successfully');
        return redirect()->back();
    }

    
}
