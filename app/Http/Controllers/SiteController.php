<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Image;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function create()
    {
        $detail=DB::table('cartsettings')->get();
        return view('admin.settings.create',compact('detail'));
    }

    public function index()
    {
        $detail=DB::table('cartsettings')->get();
        return view('admin.settings.index',compact('detail'));
    }



    public function storesetting(Request $request)
    {
        $data=array();
        $data['vat']=$request->vat;
        $data['shipping_charge']=$request->shipping_charge;
        $data['shopname']=$request->shopname;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        

        $logo=$request->file('logo');
        if ($logo) {
                $image_one_name= hexdec(uniqid()).'.'.$logo->getClientOriginalExtension();
                Image::make($logo)->resize(400,240)->save('public/media/settings/'.$image_one_name);
                $data['logo']='public/media/settings/'.$image_one_name;
                DB::table('cartsettings')->insert($data);
                $notification=array(
                     'messege'=>'Successfully Post Inserted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);

        }else{
             $data['logo']='';
              DB::table('cartsettings')->insert($data);
               $notification=array(
                     'messege'=>'Successfully Post Inserted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification); 
        }
    }

    public function deletesetting($id)
    {
        $setting=DB::table('cartsettings')->where('id',$id)->first();
        $image=$setting->logo;
        unlink($image);
        DB::table('cartsettings')->where('id',$id)->delete();
        $notification=array(
                     'messege'=>'Successfully cartsettings Deleted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);
    }

    public function editsetting($id)
    {
        $setting=DB::table('cartsettings')->where('id',$id)->first();
        return view('admin.settings.edit',compact('setting'));
    }

    public function Updatesetting(Request $request,$id)
    {
        $oldlogo=$request->old_logo;
        $data=array();
        $data['vat']=$request->vat;
        $data['shipping_charge']=$request->shipping_charge;
        $data['shopname']=$request->shopname;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        
        $logo=$request->file('logo');
         if ($logo) {
                unlink($oldlogo);
                $image_one_name= hexdec(uniqid()).'.'.$logo->getClientOriginalExtension();
                Image::make($logo)->resize(400,240)->save('public/media/settings/'.$image_one_name);
                $data['logo']='public/media/settings/'.$image_one_name;
                DB::table('cartsettings')->where('id',$id)->update($data);
                $notification=array(
                     'messege'=>'Successfully Post Update ',
                     'alert-type'=>'success'
                    );
                return Redirect()->route('sitpage')->with($notification);

         }else{
               $data['logo']=$oldlogo;
               DB::table('cartsettings')->where('id',$id)->update($data);
               $notification=array(
                     'messege'=>'Successfully Post Update ',
                     'alert-type'=>'success'
                    );
                return Redirect()->route('sitpage')->with($notification);  
        }
    }

}
