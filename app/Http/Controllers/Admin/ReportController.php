<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function TodayOrder()
    {
    	  $today=date('d-m-y');
    	  $order=DB::table('orders')->where('status',0)->where('date',$today)->get();
    	  return view('admin.report.today_order',compact('order'));
    }

    public function TodayDelevered()
    {
          $today=date('d-m-y');
    	  $order=DB::table('orders')->where('status',3)->where('date',$today)->get();
    	  return view('admin.report.today_order',compact('order'));
    }

    public function ThisMonth()
    {
    	  $month=date('F');
    	  $order=DB::table('orders')->where('status',3)->where('month',$month)->get();
    	  return view('admin.report.today_order',compact('order'));
    }

    public function search()
    {
    	 return view('admin.report.search');
    }

    public function searchByYear(Request $request)
    {
    	 $year=$request->year;
    	 $total=DB::table('orders')->where('status',3)->where('year',$year)->sum('total');
         $order=DB::table('orders')->where('status',3)->where('year',$year)->get();
         return view('admin.report.search_report',compact('order','total'));

    }

    public function searchByMonth(Request $request)
    {
        $month=$request->month;
    	 $total=DB::table('orders')->where('status',3)->where('month',$month)->sum('total');
         $order=DB::table('orders')->where('status',3)->where('month',$month)->get();
         return view('admin.report.search_report',compact('order','total'));
    }

    public function searchByDate(Request $request)
    {
    	  $date=$request->date;
          $newdate = date("d-m-y", strtotime($date));
          $total=DB::table('orders')->where('status',3)->where('date',$newdate)->sum('total');
          $order=DB::table('orders')->where('status',3)->where('date',$newdate)->get();
         return view('admin.report.search_report',compact('order','total'));
    }

    public function UserRole()
    {
    	 $user=DB::table('admins')->where('type',2)->get();
    	 return view('admin.role.all_role',compact('user'));
    }

    public function UserCreate()
    {
    	  return view('admin.role.create');
    }

    public function UserStore(Request $request)
    {
    	 $data=array();
    	 $data['name']=$request->name;
    	 $data['phone']=$request->phone;
    	 $data['email']=$request->email;
    	 $data['password']= Hash::make($request->password);
    	 $data['category']=$request->category;
    	 $data['coupon']=$request->coupon;
    	 $data['slider']=$request->slider;
    	 $data['electronics']=$request->electronics;
    	 $data['subcategorypages']=$request->subcategorypages;
    	 $data['products']=$request->products;
    	 $data['blogs']=$request->blogs;
    	 $data['orders']=$request->orders;
    	 $data['others']=$request->others;
    	 $data['reports']=$request->reports;
    	 $data['user_role']=$request->user_role;
    	 $data['return_order']=$request->return_order;
         $data['product_stock']=$request->product_stock;
         $data['contact_message']=$request->contact_message;
         $data['product_comment']=$request->product_comment;
         $data['site_settings']=$request->site_settings;
         $data['type']=2;
    	 DB::table('admins')->insert($data);
    	 $notification=array(
                 'messege'=>'Child Admin Create Successfully',
                 'alert-type'=>'success'
                       );
        return Redirect()->back()->with($notification);
    }

    public function UserDelete($id)
    {
    	 DB::table('admins')->where('id',$id)->delete();
    	 $notification=array(
                 'messege'=>' Admin Delete Successfully',
                 'alert-type'=>'success'
                       );
         return Redirect()->back()->with($notification);
    }

    public function UserEdit($id)
    {
    	 $user=DB::table('admins')->where('id',$id)->first();
    	 return view('admin.role.edit_role',compact('user'));
    }

    public function UserUpdate(Request $request)
    {
    	 $id=$request->id;
    	 $data=array();
         $data['name']=$request->name;
         $data['phone']=$request->phone;
         $data['email']=$request->email;
         $data['password']= Hash::make($request->password);
         $data['category']=$request->category;
         $data['coupon']=$request->coupon;
         $data['slider']=$request->slider;
         $data['electronics']=$request->electronics;
         $data['subcategorypages']=$request->subcategorypages;
         $data['products']=$request->products;
         $data['blogs']=$request->blogs;
         $data['orders']=$request->orders;
         $data['others']=$request->others;
         $data['reports']=$request->reports;
         $data['user_role']=$request->user_role;
         $data['return_order']=$request->return_order;
         $data['product_stock']=$request->product_stock;
         $data['contact_message']=$request->contact_message;
         $data['product_comment']=$request->product_comment;
         $data['site_settings']=$request->site_settings;
    	 DB::table('admins')->where('id',$id)->update($data);
    	 $notification=array(
                 'messege'=>'Child Admin Update Successfully',
                 'alert-type'=>'success'
                       );
        return Redirect()->route('create.user.role')->with($notification);


    }


}
