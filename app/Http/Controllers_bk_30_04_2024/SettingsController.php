<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Settings;
use DB;


class SettingsController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $setting = Settings::latest()->first();

        // dd($category);
        return view('settings.index',compact('setting'));
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_title' => 'required|string|max:255',
            // Add validation rules for other fields as needed
        ]);

        // Extract values from the request
 
        $logo = $request->file('logo');
        $footer_logo = $request->file('footer_logo');
        $preloader_logo = $request->file('preloader_logo');

        
        
        $favicon = $request->file('favicon');
        $banner_image = $request->file('banner_image');

        // dd($language);

        // Attempt to update or create a new Settings record based on the language
        $setting = Settings::updateOrCreate(
           
            [
                'project_title' => $request->project_title,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'mobile_one' => $request->mobile_one,
                'address' => $request->address,
                'copy_right' => $request->copy_right,
            ]
        );
        // dd($setting);

        // Handle logo file upload.
        if ($logo) {
            $logoFileName = time() . rand(100, 999) . '.' . $logo->extension();
            $logo->move(public_path('/logo'), $logoFileName);
            $setting->logo = $logoFileName;
        }

        if ($footer_logo) {
            $logoFileName = time() . rand(100, 999) . '.' . $footer_logo->extension();
            $footer_logo->move(public_path('/footer_logo'), $logoFileName);
            $setting->footer_logo = $logoFileName;
        }

        if ($preloader_logo) {
            $logoFileName = time() . rand(100, 999) . '.' . $preloader_logo->extension();
            $preloader_logo->move(public_path('/preloader_logo'), $logoFileName);
            $setting->preloader_logo = $logoFileName;
        }



        

        // Handle favicon file upload
        if ($favicon) {
            $faviconFileName = time() . rand(100, 999) . '.' . $favicon->extension();
            $favicon->move(public_path('/favicon'), $faviconFileName);
            $setting->favicon = $faviconFileName;
        }

         // Handle Banner image file upload
         if ($banner_image) {
            $banner_imageFileName = time() . rand(100, 999) . '.' . $banner_image->extension();
            $banner_image->move(public_path('/banner_image'), $banner_imageFileName);
            $setting->banner_image = $banner_imageFileName;
        }

        // Save the updated or created setting
        $setting->save();

        return back()->with([
            'message' => 'Settings updated successfully'
        ]);
    }

    /**
     * Display the specified category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Settings::find($id);

        if (!$category) {
            return response()->json('Category not found', 404);
        }

        return response()->json($category);
    }

    /**
     * Update the specified category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'project_title' => 'required|string|max:255',

        ]);

        $setting = Settings::latest()->first();

        if (!$setting) {
            return response()->json('Settings not found', 404);
        }

        $im = "";

        if ($request->logo != "undefined") {
            // dd($request->image);
            $image = $request->logo;
            $imgfileName = time() . rand(100, 999) . '.' . $image->extension();

            $image->move(public_path('/settings'), $imgfileName);
            $im = $imgfileName;
        }

        $setting->project_title = $request->input('project_title');
        $setting->email = $request->input('email');
        $setting->mobile = $request->input('mobile');
        $setting->mobile_one = $request->input('mobile_one');
        $setting->address = $request->input('address');
        $setting->copy_right = $request->input('copy_right');

        $setting->logo = $im;
        $setting->save();

        return response()->json('Settings updated successfully');
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Settings::find($id);

        if (!$category) {
            return response()->json('Category not found', 404);
        }

        $category->delete();

        return response()->json('Category deleted successfully');
    }
}
