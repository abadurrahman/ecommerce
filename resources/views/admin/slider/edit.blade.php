@extends('admin.admin_layouts')

@section('admin_content')
@php 
  $brand=DB::table('brands')->get();
@endphp
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">

    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Slider Section</span>
      </nav>
 
       <div class="sl-pagebody">
           <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update Slider </h6>
          <form action="{{ url('update/slider/withoutphoto/'.$slider->id) }}" method="post" >
            @csrf
          <br>
          <div class="form-layout">
            <div class="row mg-b-25">
             
              <div class="row">
            
              <div class="col-lg-4">
                <label class="ckbox">
            <input type="checkbox" name="main_slider_one" value="1" <?php if ($slider->main_slider_one == 1) {
              echo "checked";
            }?> >
            <span>Main Slider One</span>
            </label>
                       </div>
            
                       <div class="col-lg-4">
                <label class="ckbox">
            <input type="checkbox" name="main_slider_two" value="1" <?php if ($slider->main_slider_two == 1) {
              echo "checked";
            }?> >
            <span>Main Slider Two</span>
            </label>
                       </div>
            
                       <div class="col-lg-4">
                <label class="ckbox">
            <input type="checkbox" name="mens_slider_one" value="1" <?php if ($slider->mens_slider_one == 1) {
              echo "checked";
            }?> >
            <span>Men's Slider one</span>
            </label>
                       </div>
            
                       <div class="col-lg-4">
                <label class="ckbox">
            <input type="checkbox" name="mens_slider_two" value="1" <?php if ($slider->mens_slider_two == 1) {
              echo "checked";
            }?> >
            <span>Men's Slider Two</span>
            </label>
                       </div>
            
                       <div class="col-lg-4">
                <label class="ckbox">
            <input type="checkbox" name="womens_slider_one" value="1" <?php if ($slider->womens_slider_one == 1) {
              echo "checked";
            }?> >
            <span>Women's Slider one</span>
            </label>
                       </div>
            
                       <div class="col-lg-4">
                <label class="ckbox">
            <input type="checkbox" name="womens_slider_two" value="1" <?php if ($slider->womens_slider_two == 1) {
              echo "checked";
            }?> >
            <span>Women's Slider Two</span>
            </label>
                       </div>
            
                       <div class="col-lg-4">
                <label class="ckbox">
            <input type="checkbox" name="electronics_slider" value="1" <?php if ($slider->electronics_slider == 1) {
              echo "checked";
            }?> >
            <span>Electronics Slider</span>
            </label>
                       </div>
            
                       <div class="col-lg-4">
                <label class="ckbox">
            <input type="checkbox" name="blog_slider" value="1" <?php if ($slider->blog_slider == 1) {
              echo "checked";
            }?> >
            <span>Blog Slider</span>
            </label>
                       </div>
            
                       <div class="col-lg-4">
                <label class="ckbox">
            <input type="checkbox" name="contact_slider" value="1" <?php if ($slider->contact_slider == 1) {
              echo "checked";
            }?>>
            <span>Contact Slider</span>
            </label>
            </div>
              
            </div>

            </div>

            <br><br><hr>
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Update </button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div><!-- card -->
   
      </div><!-- sl-pagebody --> 

      <div class="sl-pagebody">
           <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update Slider with Photo </h6>
          <form action="{{ url('update/slider/withphoto/'.$slider->id) }}" method="post" enctype="multipart/form-data" >
            @csrf
                      
          <div class="form-layout">
            <div class="row mg-b-25">
              
              <div class="col-lg-6">
                <lebel>Slider Image (Main Thumbnail)<span class="tx-danger">*</span></lebel>
                <label class="custom-file">
                <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL(this);"  accept="image">
                <span class="custom-file-control"></span>
                <img src="#" id="one" >
              </label>
              </div>
              <div class="col-lg-6">
                <lebel>Old Image<span class="tx-danger">*</span></lebel>
                <label class="custom-file">
                <img src="{{ URL::to($slider->image_one) }}" style="height: 100px; width: 120px;" >
                <input type="hidden" name="old_one" value="{{ $slider->image_one }}">
              </label>
              </div>
              <br><br><br><br>
              <div class="col-lg-6">
                <lebel>Slider Image Two<span class="tx-danger">*</span></lebel>
                <label class="custom-file">
                <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL1(this);"  accept="image">
                <span class="custom-file-control"></span>
                <img src="#" id="two" >
              </label>
              </div>
              <div class="col-lg-6">
                <lebel>Old Image<span class="tx-danger">*</span></lebel>
                <label class="custom-file">
                <img src="{{ URL::to($slider->image_two) }}" style="height: 100px; width: 120px;" >
                <input type="hidden" name="old_two" value="{{ $slider->image_two }}">
              </label>
              </div>
              <br><br><br><br>
              <div class="col-lg-6">
                <lebel>Slider Image Three<span class="tx-danger">*</span></lebel>
                <label class="custom-file">
                <input type="file" id="file" class="custom-file-input" name="image_three" onchange="readURL2(this);"  accept="image">
                <span class="custom-file-control"></span>
                <img src="#" id="three" >
              </label>
              </div>
              <div class="col-lg-6">
                <lebel>Old Image<span class="tx-danger">*</span></lebel>
                <label class="custom-file">
                <img src="{{ URL::to($slider->image_three) }}" style="height: 100px; width: 120px;" >
                <input type="hidden" name="old_three" value="{{ $slider->image_three }}">
              </label>
              </div>

            </div>
            
           

            <br><br><hr>
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Update </button>
            </div>
          </div>f
          </form>
        </div>      
      </div>

    </div>



<script type="text/javascript">
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#one')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>

<script type="text/javascript">
  function readURL1(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#two')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>

<script type="text/javascript">
  function readURL2(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#three')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>

@endsection 


