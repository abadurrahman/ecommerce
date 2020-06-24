<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;
use DB;
use Image;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function create()
    {
        $category=DB::table('postcategories')->get();
        //return response()->json($category);
        return view('admin.blog.create',compact('category'));
    }

    public function store(Request $request)
    {
        $data=array();
        $data['post_title_en']=$request->post_title_en;
        $data['post_title_bn']=$request->post_title_bn;
        $data['post_title_cn']=$request->post_title_cn;
        $data['post_title_hn']=$request->post_title_hn;
        $data['category_id']=$request->category_id;
        $data['details_en']=$request->details_en;
        $data['details_bn']=$request->details_bn;
        $data['details_cn']=$request->details_cn;
        $data['details_hn']=$request->details_hn;
        $data['main']=$request->main;
        $data['latest_offer']=$request->latest_offer;

        $post_image=$request->file('post_image');
        if ($post_image) {
                $image_one_name= hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
                Image::make($post_image)->resize(400,240)->save('public/media/post/'.$image_one_name);
                $data['post_image']='public/media/post/'.$image_one_name;
                DB::table('posts')->insert($data);
                $notification=array(
                     'messege'=>'Successfully Post Inserted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);

        }else{
             $data['post_image']='';
              DB::table('posts')->insert($data);
               $notification=array(
                     'messege'=>'Successfully Post Inserted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification); 
        }
    }

    public function index()
    {
        $post=DB::table('posts')->join('postcategories','posts.category_id','postcategories.id')
              ->select('posts.*','postcategories.category_name_en')->get();
        return view('admin.blog.index',compact('post'));      
    }

    public function destroy($id)
    {
        $post=DB::table('posts')->where('id',$id)->first();
        $image=$post->post_image;
        unlink($image);
        DB::table('posts')->where('id',$id)->delete();
        $notification=array(
                     'messege'=>'Successfully Post Deleted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $post=DB::table('posts')->where('id',$id)->first();
        return view('admin.blog.edit',compact('post'));
    }

    public function update(Request $request,$id)
    {
        $oldimage=$request->old_image;
        $data=array();
        $data['post_title_en']=$request->post_title_en;
        $data['post_title_bn']=$request->post_title_bn;
        $data['category_id']=$request->category_id;
        $data['details_en']=$request->details_en;
        $data['details_bn']=$request->details_bn;
        $data['main']=$request->main;
        $data['latest_offer']=$request->latest_offer;
        $post_image=$request->file('post_image');
         if ($post_image) {
                unlink($oldimage);
                $image_one_name= hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
                Image::make($post_image)->resize(400,240)->save('public/media/post/'.$image_one_name);
                $data['post_image']='public/media/post/'.$image_one_name;
                DB::table('posts')->where('id',$id)->update($data);
                $notification=array(
                     'messege'=>'Successfully Post Update ',
                     'alert-type'=>'success'
                    );
                return Redirect()->route('all.blogpost')->with($notification);

         }else{
               $data['post_image']=$oldimage;
               DB::table('posts')->where('id',$id)->update($data);
               $notification=array(
                     'messege'=>'Successfully Post Update ',
                     'alert-type'=>'success'
                    );
                return Redirect()->route('all.blogpost')->with($notification);  
        }
    }

    
    //blogs tag
   
    
   public function tag()
    {
        $tag=Tag::all();
        return view('admin.blog.tag',compact('tag'));
    }


    public function storetag(Request $request)
    {
        $validatedData = $request->validate([
        'tag_name' => 'required|unique:tags|max:55',
        ]);

         $data=array();
         $data['tag_name']=$request->tag_name;
         DB::table('tags')->insert($data);
        $notification=array(
                 'messege'=>'Tag Insert Done',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }
    
     public function deletetag($id)
    {
         DB::table('tags')->where('id',$id)->delete();
         $notification=array(
                 'messege'=>'Tag Successfully Deleted',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }

    public function edittag($id)
    {
        $tag=DB::table('tags')->where('id',$id)->first();
        return view('admin.blog.edit_tag',compact('tag'));
    }

    public function updatetag(Request $request,$id)
    {
        $validatedData = $request->validate([
        'tag_name' => 'required|max:55',
        ]);
         $data=array();
         $data['tag_name']=$request->tag_name;
         $update= DB::table('tags')->where('id',$id)->update($data);
        if ($update) {
            $notification=array(
                 'messege'=>'Category Successfully Updated',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('tags')->with($notification);
        }else{
            $notification=array(
                 'messege'=>'Nothing to update',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('tags')->with($notification);
        }
    }
}
