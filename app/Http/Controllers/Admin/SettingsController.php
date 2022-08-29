<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{

    public function index()
    {
        return view('admin.settings.index');
    }

    public function socialMedia()
    {
        return view('admin.settings.contact_socialMedia');
    }

    public function about()
    {
        return view('admin.settings.about');
    }

    public function contact()
    {
        return view('admin.settings.contact');
    }


    public function edit(Request $request)
    {
        $request->validate([
            'app.name'  =>  "nullable|string|max:255" ,
            'app.address' =>"nullable|string|max:255" ,
            'app.description' =>"nullable|string" ,
            'app.email'     =>  "nullable|email" ,
            'app.phone'     =>  "nullable|numaric" ,
            'app.title'     =>  "nullable|string" ,
            'app.facebook' => "nullable|url" ,
            'app.twitter' => "nullable|url" ,
            'app.github' => "nullable|url" ,
            'app.linkedin' => "nullable|url" ,
            'app.contact-text'  =>"nullable|string" ,
            'app.about-text'  =>"nullable|string" ,

        ]);
        $settings = $request->except([
            'config[app.about-image]' , 'config[app.contact-image]' , 'config[app.cover-image]'
        ]);
        foreach($settings['config'] as $name => $value)
        {
            if($name == 'app.about-image' || $name == 'app.contact-image' || $name == 'app.cover-image'  )
            {

                    $imageName = $name . rand(500 , 8000000) . '.' . $value->getClientOriginalExtension();
                    $value = $value->storeAs("settings" , $imageName , 'public');

                    $setting = Setting::where('name' ,'=', $name)->first();
                    !is_null($setting->value) && Storage::disk('public')->delete($setting->value);

            }
            Setting::updateOrCreate([
                'name' =>  $name ,
            ] , [
                'value'  =>  $value ,
            ]);
        }
        Cache::forget('app-settings');


        return redirect()->back()->with('success' , "Settings Updated");




        // dd($request->all());
        // $textData = $request->except(['cover-image' , 'contact-image' , 'about-image' , 'logo']);
        // $fileDate = $request->only(['cover-image' , 'contact-image' , 'about-image' , 'logo']);
        // try
        // {
        //     DB::beginTransaction();
        //     if($fileDate)
        //     {
        //         foreach($fileDate as $key => $value)
        //         {
        //             // dd($fileDate);
        //                 if($value != null || $key != null)
        //                 {
        //                     $file = $request->file($key);
        //                     $imageName = $key . rand(500 , 8000000) . '.' . $file->getClientOriginalExtension();
        //                     $name = $file->storeAs("settings" , $imageName , 'public');
        //                     Setting::where('name' ,  $key)->update(['value' => $name]);
        //                     $setting = Setting::where('name' ,'=', $name)->first();
        //                     if(Storage::disk('public')->exists( $setting->value))
        //                     {
        //                     Storage::disk('public')->delete($setting->value);
        //                     }
        //                 }
        //         }
        //     }
        //     foreach($textData as $name => $value)
        //     {
        //         Setting::where('name' ,  $name)->update(['value' => $value]);
        //     }
        //     DB::commit();
        //     return redirect()->route('settings.index')->with('success' , "Setting Updated !");
        // }
        // catch(Exception $e)
        // {
        //     DB::rollBack();
        //     return $e->getMessage();
        //     return redirect()->route('settings.index')->with('success' , 'Error' . $e->getMessage());
        // }
    }

    public function getMedia()
    {
        return view('admin.settings.media');
    }
    public function media(Request $request)
    {
        $request->validate([
            "config['app.cover-image']" => 'image|mimes:jpg,bmp,png' ,
            "config['app.contact-image']" => 'nullable|image|mimes:jpg,bmp,png' ,
            "config['app.about-image']" => 'nullable|image|mimes:jpg,bmp,png' ,
        ]);
        $mim =[];
        foreach($request->config as $image)
        {
            return  $request->file($image);
        }
        dd($mim);
    }


}
