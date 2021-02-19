<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        $setting = Setting::first();
        return view('admin.setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'name' => 'required',
            'copyright' => 'required'
        ]);
        
        $setting = Setting::first();

        $setting->name = $request->name;
        $setting->facebook = $request->facebook;
        $setting->twitter = $request->twitter;
        $setting->instagram = $request->instagram;
        $setting->reddit = $request->reddit;
        $setting->email = $request->email;
        $setting->description = $request->description;
        $setting->copyright = $request->copyright;
        $setting->phone = $request->phone;
        $setting->address = $request->address;


        if($request->hasFile('logo'))
        {
            $logo = $request->logo;
            $logo_new_name = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move('storage/setting', $logo_new_name);
            $setting->logo = '/storage/setting/' . $logo_new_name;
        }

        $setting->save();

        Session::flash('success', 'Setting updated successfully!');
        return redirect()->back();
    }

}
