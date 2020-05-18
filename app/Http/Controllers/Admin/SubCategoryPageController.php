<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class SubCategoryPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
 

    public function index()
    {
    	$subcategorypage=DB::table('subcategorypages')
        ->join('categories','subcategorypages.category_id','categories.id')
        ->join('brands','subcategorypages.brand_id','brands.id')
        ->select('subcategorypages.*','categories.category_name','brands.brand_name')
        ->get();
        return view('admin.subcategorypage.index',compact('subcategorypage'));

    }

    public function create()
    {
    	$category=DB::table('categories')->get();
    	$brand=DB::table('brands')->get();
    	return view('admin.subcategorypage.create',compact('category','brand'));
    }



  //subcategory collect by ajax request
    public function GetSubcat($category_id)
    {
    	$cat = DB::table("subcategories")->where("category_id",$category_id)->get();
        return json_encode($cat);
    }

    public function Store(Request $request)
    {
        $data=array();
        $data['title']=$request->title;
    	$data['product_name']=$request->product_name;
    	$data['product_code']=$request->product_code;
    	$data['product_quantity']=$request->product_quantity;
    	$data['category_id']=$request->category_id;
    	$data['subcategory_id']=$request->subcategory_id;
    	$data['brand_id']=$request->brand_id;
    	$data['product_size']=$request->product_size;
    	$data['product_color']=$request->product_color;
    	$data['selling_price']=$request->selling_price;
    	$data['product_details']=$request->product_details;
    	$data['video_link']=$request->video_link;
    	$data['single_image']=$request->single_image;
    	$data['product']=$request->product;
    	$data['status']=1;
    	$image_one=$request->image_one;
    	$image_two=$request->image_two;
    	$image_three=$request->image_three;

    if($image_one && $image_two && $image_three){
            $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(230,300)->save('public/media/subcategorypage/'.$image_one_name);
                $data['image_one']='public/media/subcategorypage/'.$image_one_name;

            $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                Image::make($image_two)->resize(230,300)->save('public/media/subcategorypage/'.$image_two_name);
                $data['image_two']='public/media/subcategorypage/'.$image_two_name; 

            $image_three_name= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
                Image::make($image_three)->resize(230,300)->save('public/media/subcategorypage/'.$image_three_name);
                $data['image_three']='public/media/subcategorypage/'.$image_three_name; 
                
                $subcategorypage=DB::table('subcategorypages')
                          ->insert($data);
                    $notification=array(
                     'messege'=>'Successfully Product Inserted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);   
        }
   
    }



       public function Inactive($id)
    {
         DB::table('subcategorypages')->where('id',$id)->update(['status'=> 0]);
         $notification=array(
                     'messege'=>'Successfully Product Inactive ',
                     'alert-type'=>'success'
                    );
         return Redirect()->back()->with($notification);  
    }

    public function Active($id)
    {
         DB::table('subcategorypages')->where('id',$id)->update(['status'=> 1]);
         $notification=array(
                     'messege'=>'Successfully Product Aactive ',
                     'alert-type'=>'success'
                    );
         return Redirect()->back()->with($notification);
    }

    public function DeleteSubcategorypages($id)
    {
        $product=DB::table('subcategorypages')->where('id',$id)->first();
        $image1=$product->image_one;
        $image2=$product->image_two;
        $image3=$product->image_three;
        unlink($image1);
        unlink($image2);
        unlink($image3);
        DB::table('subcategorypages')->where('id',$id)->delete();
        $notification=array(
                     'messege'=>'Successfully subcategorypages Deleted ',
                     'alert-type'=>'success'
                    );
         return Redirect()->back()->with($notification);

    }

    public function ViewSubcategorypages($id)
    {
        $subcategorypage=DB::table('subcategorypages')
                ->join('categories','subcategorypages.category_id','categories.id')
                ->join('brands','subcategorypages.brand_id','brands.id')
                ->join('subcategories','subcategorypages.subcategory_id','subcategories.id')
                ->select('subcategorypages.*','categories.category_name','brands.brand_name','subcategories.subcategory_name')
                ->where('subcategorypages.id',$id)
                ->first();
        return view('admin.subcategorypage.show',compact('subcategorypage'));

    }

    public function EditSubcategorypages($id)
    {
        $subcategorypage=DB::table('subcategorypages')->where('id',$id)->first();

        return view('admin.subcategorypage.edit',compact('subcategorypage'));
    }

    public function UpdateSubcategorypageWithoutPhoto(Request $request,$id)
    {
        $data=array();
        $data['product_name']=$request->product_name;
        $data['product_code']=$request->product_code;
        $data['product_quantity']=$request->product_quantity;
        $data['category_id']=$request->category_id;
        $data['discount_price']=$request->discount_price;
        $data['subcategory_id']=$request->subcategory_id;
        $data['brand_id']=$request->brand_id;
        $data['product_size']=$request->product_size;
        $data['product_color']=$request->product_color;
        $data['selling_price']=$request->selling_price;
        $data['product_details']=$request->product_details;
        $data['video_link']=$request->video_link;
        $data['single_image']=$request->single_image;
        $data['product']=$request->product;
        
        $update=DB::table('subcategorypages')->where('id',$id)->update($data);
        if ($update) {
             $notification=array(
                     'messege'=>'Successfully subcategorypages Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.subcategorypages')->with($notification);

        }else{
            $notification=array(
                     'messege'=>'Nothing To Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.subcategorypages')->with($notification);
        }
    }

    public function UpdateSubcategorypagePhoto(Request $request,$id)
    {
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
           Image::make($image_one)->resize(300,300)->save('public/media/subcategorypage/'.$image_one_name);
           $data['image_one']='public/media/subcategorypage/'.$image_one_name;
           DB::table('subcategorypages')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Image One Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.subcategorypages')->with($notification);


        }if($request->has('image_two')) {
           unlink($old_two);
           $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
           Image::make($image_two)->resize(230,300)->save('public/media/subcategorypage/'.$image_two_name);
           $data['image_two']='public/media/subcategorypage/'.$image_two_name;
           DB::table('subcategorypages')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Image Two Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.subcategorypages')->with($notification);
        }if($request->has('image_three')) {
           unlink($old_three);
           $image_three_name= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
           Image::make($image_three)->resize(230,300)->save('public/media/subcategorypage/'.$image_three_name);
           $data['image_three']='public/media/subcategorypage/'.$image_three_name;
           DB::table('subcategorypages')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Image Three Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.subcategorypages')->with($notification);
        }if($request->has('image_one') && $request->has('image_two')){
            
           unlink($old_one);
           $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
           Image::make($image_one)->resize(230,300)->save('public/media/subcategorypage/'.$image_one_name);
           $data['image_one']='public/media/subcategorypage/'.$image_one_name;
            
           unlink($old_two); 
           $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
           Image::make($image_two)->resize(230,300)->save('public/media/subcategorypage/'.$image_two_name);
           $data['image_two']='public/media/subcategorypage/'.$image_two_name;

           DB::table('subcategorypages')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Image One and Two Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.subcategorypages')->with($notification);
           


        }if($request->has('image_one') && $request->has('image_two') && $request->has('image_three')){
           unlink($old_one);
           unlink($old_two);
           unlink($old_three);
           $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
           Image::make($image_one)->resize(230,300)->save('public/media/subcategorypage/'.$image_one_name);
           $data['image_one']='public/media/subcategorypage/'.$image_one_name;
            
           $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
           Image::make($image_two)->resize(230,300)->save('public/media/subcategorypage/'.$image_two_name);
           $data['image_two']='public/media/subcategorypage/'.$image_two_name;

            $image_three_name= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
           Image::make($image_three)->resize(230,300)->save('public/media/subcategorypage/'.$image_three_name);
           $data['image_three']='public/media/subcategorypage/'.$image_three_name;
            DB::table('subcategorypages')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Image One and Two Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.subcategorypages')->with($notification);
          

        }
         return Redirect()->route('all.subcategorypages');
    }
}
