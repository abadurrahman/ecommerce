<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class SliderController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
    	$slider=DB::table('sliders')->get();
        return view('admin.slider.index',compact('slider'));

    }


    public function create()
    {
    	
    	$slider=DB::table('sliders')->get();
    	return view('admin.slider.create',compact('slider'));
    }



    public function store(Request $request)
    {
        $data=array();
    	$data['main_slider_one']=$request->main_slider_one;
    	$data['main_slider_two']=$request->main_slider_two;
    	$data['mens_slider_one']=$request->mens_slider_one;
    	$data['mens_slider_two']=$request->mens_slider_two;
    	$data['womens_slider_one']=$request->womens_slider_one;
    	$data['womens_slider_two']=$request->womens_slider_two;
        $data['electronics_slider']=$request->electronics_slider;
        $data['blog_slider']=$request->blog_slider;
        $data['contact_slider']=$request->contact_slider;
    	$data['status']=1;

    	$image_one=$request->image_one;
        $image_two=$request->image_two;
        $image_three=$request->image_three;


        if($image_one && $image_two && $image_three){
            $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(230,300)->save('public/media/slider/'.$image_one_name);
                $data['image_one']='public/media/slider/'.$image_one_name;   

            $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                Image::make($image_two)->resize(230,300)->save('public/media/slider/'.$image_two_name);
                $data['image_two']='public/media/slider/'.$image_two_name; 

            $image_three_name= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
                Image::make($image_three)->resize(230,300)->save('public/media/slider/'.$image_three_name);
                $data['image_three']='public/media/slider/'.$image_three_name; 

                $slider=DB::table('sliders')
                          ->insert($data);
                    $notification=array(
                     'messege'=>'Successfully slider Inserted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);   
        }
   
    }


      /* if($image_one){
            $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(230,300)->save('public/media/slider/'.$image_one_name);
                $data['image_one']='public/media/slider/'.$image_one_name;
                
                $product=DB::table('sliders')
                          ->insert($data);
                    $notification=array(
                     'messege'=>'Successfully Slider Inserted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);   
        }
   
    }*/


		      public function Inactive($id)
		       {
		         DB::table('sliders')->where('id',$id)->update(['status'=> 0]);
		         $notification=array(
		                     'messege'=>'Successfully slider Inactive ',
		                     'alert-type'=>'success'
		                    );
		         return Redirect()->back()->with($notification);  
		       }

		    public function Active($id)
		    {
		         DB::table('sliders')->where('id',$id)->update(['status'=> 1]);
		         $notification=array(
		                     'messege'=>'Successfully Product Aactive ',
		                     'alert-type'=>'success'
		                    );
		         return Redirect()->back()->with($notification);
		    }


     public function DeleteSlider($id)
    {
        $product=DB::table('sliders')->where('id',$id)->first();
        $image_one=$product->image_one;
        unlink($image_one);
        DB::table('sliders')->where('id',$id)->delete();
        $notification=array(
                     'messege'=>'Successfully sliders Deleted ',
                     'alert-type'=>'success'
                    );
         return Redirect()->back()->with($notification);

    }

     public function ViewProduct($id)
    {
        $slider=DB::table('sliders')
                ->join('brands','sliders.brand_id','brands.id')
                ->select('sliders.*','brands.brand_name')
                ->where('sliders.id',$id)
                ->first();
        return view('admin.slider.show',compact('slider'));

    }

    public function EditSlider($id)
    {
        $slider=DB::table('sliders')->where('id',$id)->first();

        return view('admin.slider.edit',compact('slider'));
    }


    public function UpdateSliderWithoutPhoto(Request $request,$id)
     {   

        $data=array();
        $data['main_slider_one']=$request->main_slider_one;
        $data['main_slider_two']=$request->main_slider_two;
        $data['mens_slider_one']=$request->mens_slider_one;
        $data['mens_slider_two']=$request->mens_slider_two;
        $data['womens_slider_one']=$request->womens_slider_one;
        $data['womens_slider_two']=$request->womens_slider_two;
        $data['electronics_slider']=$request->electronics_slider;
        $data['blog_slider']=$request->blog_slider;
        $data['contact_slider']=$request->contact_slider;
        $data['status']=1;
        
        $update=DB::table('sliders')->where('id',$id)->update($data);
        if ($update) {
             $notification=array(
                     'messege'=>'Successfully slider Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.slider')->with($notification);

        }else{
            $notification=array(
                     'messege'=>'Nothing To Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.slider')->with($notification);
        }
    }


     public function UpdateSliderWithPhoto(Request $request,$id)
    {
        $data=array();
        $data['main_slider_one']=$request->main_slider_one;
        $data['main_slider_two']=$request->main_slider_two;
        $data['mens_slider_one']=$request->mens_slider_one;
        $data['mens_slider_two']=$request->mens_slider_two;
        $data['womens_slider_one']=$request->womens_slider_one;
        $data['womens_slider_two']=$request->womens_slider_two;
        $data['electronics_slider']=$request->electronics_slider;
        $data['blog_slider']=$request->blog_slider;
        $data['contact_slider']=$request->contact_slider;
       // $data['image_one']=$request->image_one;


        $old_one=$request->old_one;
        $old_two=$request->old_two;
        $old_three=$request->old_three;

        $image_one=$request->image_one;
        $image_two=$request->image_two;
        $image_three=$request->image_three;
        $data=array();

        if($request->has('image_one')) {
           unlink($old_one);
           $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
           Image::make($image_one)->resize(300,300)->save('public/media/slider/'.$image_one_name);
           $data['image_one']='public/media/slider/'.$image_one_name;
           DB::table('sliders')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Image One Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.slider')->with($notification);


        }if($request->has('image_two')) {
           unlink($old_two);
           $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
           Image::make($image_two)->resize(230,300)->save('public/media/slider/'.$image_two_name);
           $data['image_two']='public/media/slider/'.$image_two_name;
           DB::table('sliders')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Image Two Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.slider')->with($notification);

        }if($request->has('image_three')) {
           unlink($old_three);
           $image_three_name= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
           Image::make($image_three)->resize(230,300)->save('public/media/slider/'.$image_three_name);
           $data['image_three']='public/media/slider/'.$image_three_name;
           DB::table('sliders')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Image Three Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.slider')->with($notification);

        }if($request->has('image_one') && $request->has('image_two')){
            
           unlink($old_one);
           $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
           Image::make($image_one)->resize(230,300)->save('public/media/slider/'.$image_one_name);
           $data['image_one']='public/media/slider/'.$image_one_name;
            
           unlink($old_two); 
           $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
           Image::make($image_two)->resize(230,300)->save('public/media/slider/'.$image_two_name);
           $data['image_two']='public/media/slider/'.$image_two_name;

           DB::table('sliders')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Image One and Two Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.slider')->with($notification);
           


        }if($request->has('image_one') && $request->has('image_two') && $request->has('image_three')){
           unlink($old_one);
           unlink($old_two);
           unlink($old_three);
           $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
           Image::make($image_one)->resize(230,300)->save('public/media/slider/'.$image_one_name);
           $data['image_one']='public/media/slider/'.$image_one_name;
            
           $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
           Image::make($image_two)->resize(230,300)->save('public/media/slider/'.$image_two_name);
           $data['image_two']='public/media/slider/'.$image_two_name;

            $image_three_name= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
           Image::make($image_three)->resize(230,300)->save('public/media/slider/'.$image_three_name);
           $data['image_three']='public/media/slider/'.$image_three_name;
            DB::table('sliders')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Image One and Two Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.slider')->with($notification);
          

        }
         return Redirect()->route('all.slider');
    }
        
       /* $old_one=$request->old_one;
        $image_one=$request->file('image_one');

        if ($image_one) {
                unlink($old_one);
                $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(400,240)->save('public/media/slider/'.$image_one_name);
                $data['image_one']='public/media/slider/'.$image_one_name;
                DB::table('sliders')->where('id',$id)->update($data);
                $notification=array(
                     'messege'=>'Successfully Post Update ',
                     'alert-type'=>'success'
                    );
                return Redirect()->route('all.slider')->with($notification);

         }else{
               $data['image_one']=$old_one;
               DB::table('sliders')->where('id',$id)->update($data);
               $notification=array(
                     'messege'=>'Successfully Post Update ',
                     'alert-type'=>'success'
                    );
                return Redirect()->route('all.slider')->with($notification);  
        }
    }*/
}
