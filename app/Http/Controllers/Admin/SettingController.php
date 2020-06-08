<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function SiteSetting()
    {
    	 $setting=DB::table('sitesetting')->first();
    	 return view('admin.setting.site_setting',compact('setting'));
    }

    public function UpdateSetting(Request $request)
    {
    	 $id=$request->id;
    	 $data=array();
    	 $data['phone_one']=$request->phone_one;
    	 $data['phone_two']=$request->phone_two;
    	 $data['email']=$request->email;
    	 $data['company_name']=$request->company_name;
    	 $data['company_address']=$request->company_address;
    	 $data['facebook']=$request->facebook;
    	 $data['youtube']=$request->youtube;
    	 $data['instagram']=$request->instagram;
    	 $data['twitter']=$request->twitter; 
    	 DB::table('sitesetting')->where('id',$id)->update($data);
    	 $notification=array(
                 'messege'=>'Setting Update',
                 'alert-type'=>'success'
                       );
        return Redirect()->back()->with($notification);
    }

    public function DatabaseBackup()
    {
          return view('admin.setting.db_backup')->with('files', File::allFiles('storage/app/Laravel'));
    }

    public function BackupNow()
    {
         \Artisan::call('backup:run');
         $notification=array(
                       'messege'=>'Successfully Database Backup ',
                       'alert-type'=>'success'
                  );    
        return Redirect()->back()->with($notification);      
    }

    public function DeleteDatabase($getFilename)
    {
       Storage::delete('Laravel/'.$getFilename);
       $notification=array(
                       'messege'=>'Successfully Backup Delete  ',
                       'alert-type'=>'success'
                  );    
        return Redirect()->back()->with($notification);  
    }



}
