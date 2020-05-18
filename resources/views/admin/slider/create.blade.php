@extends('admin.admin_layouts')

@section('admin_content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">

    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Product Section</span>
      </nav>
      <div class="sl-pagebody">
      	   <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">New Product Add <a href="{{ route('all.slider')}}" class="btn btn-info btn-sm pull-right">All Slider</a></h6>
          <p class="mg-b-20 mg-sm-b-30">New Slider add form</p>
          <form action="{{ route('store.slider') }}" method="post" enctype="multipart/form-data">
          	@csrf
          
          <div class="form-layout">
            <div class="row mg-b-25">
              

              <div class="col-lg-4">
              	<lebel>Image One (Main Thumbnail)<span class="tx-danger">*</span></lebel>
              	<label class="custom-file">
      				  <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL(this);" required="" accept="image">
      				  <span class="custom-file-control"></span>
      				  <img src="#" id="one" >
      				</label>
              </div>

              <div class="col-lg-4">
                <lebel>Image Two<span class="tx-danger">*</span></lebel>
                <label class="custom-file">br
                <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL1(this);" required="" accept="image">
                <span class="custom-file-control"></span>
                <img src="#" id="two" >
              </label>
              </div>
               
            <div class="col-lg-4">
                <lebel>Image Three<span class="tx-danger">*</span></lebel>
                <label class="custom-file">
                <input type="file" id="file" class="custom-file-input" name="image_three" onchange="readURL2(this);" required="" accept="image">
                <span class="custom-file-control"></span>
                <img src="#" id="three" >
              </label>
              </div>

              
            </div><!-- row -->
            <br><hr>
            <div class="row">
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="main_slider_one" value="1">
					  <span>Main Slider One</span>
					</label>
            	</div>
              <div class="col-lg-4">
                <label class="ckbox">
            <input type="checkbox" name="main_slider_two" value="1">
            <span>Main Slider Two</span>
          </label>
           </div>
            
           <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="mens_slider_one" value="1">
                  <span>Men's Slider one</span>
                </label>
              </div>

              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="mens_slider_two" value="1">
                  <span>Men's Slider Two</span>
                </label>
              </div>

           <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="womens_slider_one" value="1">
                  <span>Women's Slider one</span>
                </label>
              </div>

              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="womens_slider_two" value="1">
                  <span>Women's Slider Two</span>
                </label>
              </div>

            	<div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="electronics_slider" value="1">
                  <span>Electronics Slider</span>
                </label>
              </div>

              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="blog_slider" value="1">
                  <span>Blog Slider</span>
                </label>
              </div>

              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="contact_slider" value="1">
                  <span>Contact Slider</span>
                </label>
              </div>

            </div>

            <br><br><hr>
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Submit </button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div><!-- card -->
       
      </div><!-- sl-pagebody --> 
    </div><!-- sl-mainpanel -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>

<script type="text/javascript">
	  $(document).ready(function() {
         $('select[name="category_id"]').on('change', function(){
             var category_id = $(this).val();
             if(category_id) {
                 $.ajax({
                     url: "{{  url('/get/subcategory/') }}/"+category_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                        var d =$('select[name="subcategory_id"]').empty();
                           $.each(data, function(key, value){

                               $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name + '</option>');

                           });
  
                     },
                    
                 });
             } else {
                 alert('danger');
             }

         });
     });

</script>

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
