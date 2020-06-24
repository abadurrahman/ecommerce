<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use App\Model\Admin\Brand;
use App\Postcategory;
use DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    
   public function catgory()
    {
    	$category=Category::all();
    	return view('admin.category.category',compact('category'));
    }


    public function storecatgory(Request $request)
    {
    	$validatedData = $request->validate([
        'category_name' => 'required|unique:categories|max:55',
        ]);

        // $data=array();
        // $data['category_name']=$request->category_name;
        // DB::table('categories')->insert($data);

        $category = new Category();
        $category->category_name =$request->category_name;
        $category->save();
        $notification=array(
                 'messege'=>'Category Insert Done',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }
    
     public function DeleteCategory($id)
    {
    	 DB::table('categories')->where('id',$id)->delete();
    	 $notification=array(
                 'messege'=>'Category Successfully Deleted',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }

    public function EditCategory($id)
    {
    	$category=DB::table('categories')->where('id',$id)->first();
    	return view('admin.category.edit_category',compact('category'));
    }

    public function UpdateCategory(Request $request,$id)
    {
    	$validatedData = $request->validate([
        'category_name' => 'required|max:55',
        ]);
         $data=array();
         $data['category_name']=$request->category_name;
         $update= DB::table('categories')->where('id',$id)->update($data);
        if ($update) {
        	$notification=array(
                 'messege'=>'Category Successfully Updated',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('categories')->with($notification);
        }else{
        	$notification=array(
                 'messege'=>'Nothing to update',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('categories')->with($notification);
        }
    }


     public function brand()
    {
        $brand=Brand::all();
        return view('admin.category.brand',compact('brand'));
    }

    public function storebrand(Request $request)
    {
        $validatedData = $request->validate([
        'brand_name' => 'required|unique:brands|max:55',
        ]);

        $data=array();
        $data['brand_name']=$request->brand_name; 
        $image=$request->file('brand_logo');
            if ($image) {
                // $image_name= str_random(5);
                $image_name= date('dmy_H_s_i');

                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='public/media/brand/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
              
                $data['brand_logo']=$image_url;
                $brand=DB::table('brands')
                          ->insert($data);
                    $notification=array(
                     'messege'=>'Successfully Brand Inserted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);                      
            }else{
              $brand=DB::table('brands')
                          ->insert($data);
                 $notification=array(
                     'messege'=>'Done!',
                     'alert-type'=>'success'
                      );
                return Redirect()->back()->with($notification); 
            }

    }

    public function DeleteBrand($id)
    {
        $data=DB::table('brands')->where('id',$id)->first();
        $image=$data->brand_logo;
        unlink($image);
        $brand=DB::table('brands')->where('id',$id)->delete();
                $notification=array(
                     'messege'=>'Successfully Brand Deleted ',
                     'alert-type'=>'success'
                );
        return Redirect()->back()->with($notification);   

    }

    public function EditBrand($id)
    {
         $brand=DB::table('brands')->where('id',$id)->first();
         return view('admin.category.edit_brand',compact('brand'));
    }

    public function UpdateBrand(Request $request,$id)
    {
       $oldlogo=$request->old_logo;
        $data=array();
        $data['brand_name']=$request->brand_name; 
        $image=$request->file('brand_logo');
            if ($image) {
                unlink($oldlogo);
                $image_name= date('dmy_H_s_i');
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='public/media/brand/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                $data['brand_logo']=$image_url;
                $brand=DB::table('brands')->where('id',$id)->update($data);
                    $notification=array(
                     'messege'=>'Successfully Brand Updated ',
                     'alert-type'=>'success'
                    );
                return Redirect()->route('brands')->with($notification);                      
            }else{
              $brand=DB::table('brands')->where('id',$id)->update($data);
                 $notification=array(
                     'messege'=>'Update without image!',
                     'alert-type'=>'success'
                      );
                return Redirect()->route('brands')->with($notification); 
            
    }}



    public function subcategories()
    {
    	$category=DB::table('categories')->get();
    	$subcat=DB::table('subcategories')
    	       ->join('categories','subcategories.category_id','categories.id')
    	       ->select('subcategories.*','categories.category_name')
    	       ->get();
        return view('admin.category.subcategory',compact('category','subcat'));
    }

    public function storesubcat(Request $request)
    {
    	$validatedData = $request->validate([
         'category_id' => 'required',
         'subcategory_name' => 'required|',

        ]);

        $data=array();
        $data['category_id']=$request->category_id;
        $data['subcategory_name']=$request->subcategory_name;
        $data['subcat_1']=$request->subcat_1;
        $data['subcat_2']=$request->subcat_2;
        DB::table('subcategories')->insert($data);
            $notification=array(
                'messege'=>'Sub Category Inserted',
                'alert-type'=>'success'
                );
        return Redirect()->back()->with($notification); 
    }

    public function DeleteSubCat($id)
    {
    	DB::table('subcategories')->where('id',$id)->delete();
            $notification=array(
                'messege'=>'Sub Category Deleted',
                'alert-type'=>'success'
                );
        return Redirect()->back()->with($notification); 

    }

    public function EditSubCat($id)
    {
    	$subcat=DB::table('subcategories')->where('id',$id)->first();
    	$category=DB::table('categories')->get();
    	return view('admin.category.edit_subcat',compact('subcat','category'));
    }

    public function UpdateSubCat(Request $request,$id)
    {
    	$data=array();
        $data['category_id']=$request->category_id;
        $data['subcategory_name']=$request->subcategory_name;
        $data['subcat_1']=$request->subcat_1;
        $data['subcat_2']=$request->subcat_2;
        DB::table('subcategories')->where('id',$id)->update($data);
            $notification=array(
                'messege'=>'Sub Category Updated',
                'alert-type'=>'success'
                );
        return Redirect()->route('sub.categories')->with($notification); 
    }

   public function category()
    {
        $postcategory=Postcategory::all();
        return view('admin.category_post.postcategory',compact('postcategory'));

    }

    public function storepostcategory(Request $request)
    {
        $validatedData = $request->validate([
        'category_name_en' => 'required|unique:postcategories|max:55',
        'category_name_bn' => 'required|unique:postcategories|max:55',
        'category_name_cn' => 'required|unique:postcategories|max:55',
        'category_name_hn' => 'required|unique:postcategories|max:55',
        ]);

        // $data=array();
        // $data['category_name']=$request->category_name;
        // DB::table('categories')->insert($data);

        $category = new Postcategory();
        $category->category_name_en =$request->category_name_en;
        $category->category_name_bn =$request->category_name_bn;
        $category->category_name_cn =$request->category_name_cn;
        $category->category_name_hn =$request->category_name_hn;
        $category->save();
        $notification=array(
                 'messege'=>'Category Insert Done',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }
    
     public function DeletePostCategory($id)
    {
         DB::table('postcategories')->where('id',$id)->delete();
         $notification=array(
                 'messege'=>'Category Successfully Deleted',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }

    public function EditPostCategory($id)
    {
        $postcategory=DB::table('postcategories')->where('id',$id)->first();
        return view('admin.category_post.edit_postcategories',compact('postcategory'));
    }

    public function UpdatepostCategory(Request $request,$id)
    {
        $validatedData = $request->validate([
        'category_name_en' => 'required|max:55',
        'category_name_bn' => 'required|max:55',
        'category_name_cn' => 'required|max:55',
        'category_name_hn' => 'required|max:55',

        ]);
         $data=array();
         $data['category_name_en']=$request->category_name_en;
         $data['category_name_bn']=$request->category_name_bn;
         $data['category_name_cn']=$request->category_name_cn;
         $data['category_name_hn']=$request->category_name_hn;
         $update= DB::table('postcategories')->where('id',$id)->update($data);
        if ($update) {
            $notification=array(
                 'messege'=>'Category Successfully Updated',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('post.category')->with($notification);
        }else{
            $notification=array(
                 'messege'=>'Nothing to update',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('post.category')->with($notification);
        }
    }

   
}
