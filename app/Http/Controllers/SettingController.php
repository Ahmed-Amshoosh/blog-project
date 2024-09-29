<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function setting()
    {
        $websiteInfo=Setting::all()->first();

        return view('admin.Setting.setting' ,compact('websiteInfo'));
    }
    public function setting_update(Request $request)
    {
        $settings = DB::table('settings')->first();

        // Handle the logo update
        $logoName = $settings->logo;  // Start with the current logo
        if ($request->hasFile('logo')) {
            // Generate a new name for the uploaded logo and move the file
            $logoName = time().'.'.$request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('images'), $logoName);

            // Optionally, delete the old logo if it exists
            if ($settings->logo && file_exists(public_path('images/' . $settings->logo))) {
                unlink(public_path('images/' . $settings->logo));
            }
        }

        // Handle the logo2 update
        $logo2Name = $settings->logo2;  // Start with the current logo2
        if ($request->hasFile('logo2')) {
            // Generate a new name for the uploaded logo2 and move the file
            $logo2Name = time().'.'.$request->logo2->getClientOriginalExtension();
            $request->logo2->move(public_path('images'), $logo2Name);

            // Optionally, delete the old logo2 if it exists
            if ($settings->logo2 && file_exists(public_path('images/' . $settings->logo2))) {
                unlink(public_path('images/' . $settings->logo2));
            }
        }

        // Handle the favicon update
        $faviconName = $settings->favicon;  // Start with the current favicon
        if ($request->hasFile('favicon')) {
            // Generate a new name for the uploaded favicon and move the file
            $faviconName = time().'.'.$request->favicon->getClientOriginalExtension();
            $request->favicon->move(public_path('images'), $faviconName);

            // Optionally, delete the old favicon if it exists
            if ($settings->favicon && file_exists(public_path('images/' . $settings->favicon))) {
                unlink(public_path('images/' . $settings->favicon));
            }
        }

        // Update the settings table with the new values
        DB::table('settings')->update([
            'website_name' => $request->website_name,
            'website_desc' => $request->website_desc,
            'website_keywords' => $request->website_keywords,
            'logo' => $logoName,
            'logo2' => $logo2Name,
            'favicon' => $faviconName,
        ]);
//        $request->validate([
//            'website_name' => 'required|string|max:100',
//            'logo' => 'required',
//            'logo2' => 'required',
//            'favicon' => 'required',
//        ]);
//        $logoName=$request->logo;
//        if ($request->logo){
//            $logoName = time().'.'.request()->logo->getClientOriginalExtension();
//            request()->logo->move(public_path('images'), $logoName);
//        }
//        $logo2Name=$request->logo;
//        if ($request->logo){
//            $logo2Name = time().'.'.request()->logo2->getClientOriginalExtension();
//            request()->logo2->move(public_path('images'), $logo2Name);
//        }
//        $faviconName=$request->favicon;
//        if ($request->favicon){
//            $faviconName = time().'.'.request()->favicon->getClientOriginalExtension();
//            request()->favicon->move(public_path('images'), $faviconName);
//        }
//
//
//
//        DB::table('settings')->update([
//            'website_name' => $request->website_name,
//            'logo'=> $logoName,
//            'logo2'=> $logo2Name,
//            'favicon'=>$faviconName,
//        ]);
        return redirect()->back()->with('success', 'Website Setting Updated successfully!');

    }
}
