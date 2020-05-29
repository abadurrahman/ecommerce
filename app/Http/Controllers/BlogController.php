<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class BlogController extends Controller
{
     public function blog()
     {
     	$post=DB::table('posts')->join('postcategories','posts.category_id','postcategories.id')->select('posts.*','postcategories.category_name_en','postcategories.category_name_bn','postcategories.category_name_cn','postcategories.category_name_hn')->get();
     	 return view('pages.blog',compact('post'));
     	 
     }

     public function Bangla()
     {
     	Session::get('lang');
     	session()->forget('lang');
     	Session::put('lang','bangla');
     	return redirect()->back();


     }

     public function English()
     {
     	Session::get('lang');
     	session()->forget('lang');
     	Session::put('lang','english');
     	return redirect()->back();

     }


}
