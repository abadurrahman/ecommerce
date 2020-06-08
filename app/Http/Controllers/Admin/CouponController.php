<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CouponController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Coupon()
    {
    	$coupon=DB::table('coupons')->get();
    	return view('admin.coupon.coupon',compact('coupon'));
    }

    public function StoreCoupon(Request $request)
    {
    	$data=array();
    	$data['coupon']=$request->coupon;
    	$data['discount']=$request->discount;
    	DB::table('coupons')->insert($data);
    	$notification=array(
                 'messege'=>'Coupon Insert Done',
                 'alert-type'=>'success'
                       );
        return Redirect()->back()->with($notification);
    }

    public function DeleteCoupon($id)
    {
    	DB::table('coupons')->where('id',$id)->delete();
    	$notification=array(
                 'messege'=>'Coupon Delete Done',
                 'alert-type'=>'success'
                       );
        return Redirect()->back()->with($notification);

    }

    public function EditCoupon($id)
    {
    	$coupon=DB::table('coupons')->where('id',$id)->first();
    	return view('admin.coupon.edit_coupon',compact('coupon'));
    }

    public function UpdateCoupon(Request $request,$id)
    {
    	$data=array();
    	$data['coupon']=$request->coupon;
    	$data['discount']=$request->discount;
    	DB::table('coupons')->where('id',$id)->update($data);
    	$notification=array(
                 'messege'=>'Coupon Update Done',
                 'alert-type'=>'success'
                       );
        return Redirect()->route('admin.coupon')->with($notification);
    }

    public function Newslater()
    {
        $sub=DB::table('newslaters')->get();
        return view('admin.coupon.newslaters',compact('sub'));
    }

      public function DeleteSub($id)
    {
        DB::table('newslaters')->where('id',$id)->delete();
        $notification=array(
                 'messege'=>'Subscriber Delete Done',
                 'alert-type'=>'success'
                       );
        return Redirect()->back()->with($notification);
    }

  public function Seo()
    {
        $seo=DB::table('seo')->first();
        return view('admin.coupon.seo',compact('seo'));
    }

    public function UpdateSeo(Request $request)
    {
        $id=$request->id;
         $data=array();
         $data['meta_title']=$request->meta_title;
         $data['meta_author']=$request->meta_author;
         $data['meta_tag']=$request->meta_tag;
         $data['meta_description']=$request->meta_description;
         $data['google_analytics']=$request->google_analytics;
         $data['bing_analytics']=$request->bing_analytics;
         DB::table('seo')->where('id',$id)->update($data);
         $notification=array(
                 'messege'=>'SEO Updated',
                 'alert-type'=>'success'
                       );
        return Redirect()->back()->with($notification);
    }



}
