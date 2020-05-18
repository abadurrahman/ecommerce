@extends('admin.admin_layouts')

@section('admin_content')
@php 
  $brand=DB::table('brands')->get();
  $category=DB::table('categories')->get();
  $subcategory=DB::table('subcategories')->get();
@endphp
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">

    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Product Section</span>
      </nav>
      <div class="sl-pagebody">
      	   <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update Product </h6>
          <form action="{{ url('update/product/withoutphoto/'.$product->id) }}" method="post" >
          	@csrf
          
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_name"  value="{{ $product->product_name }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_code"  value="{{ $product->product_code }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Quantity <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_quantity" value="{{ $product->product_quantity }}" >
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Discount Price <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="discount_price" value="{{ $product->discount_price }}" >
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose Category" name="category_id">
                    <option label="Choose Category"></option>
                    @foreach($category as $row)
                    <option value="{{ $row->id }}" <?php if ($row->id == $product->category_id) {
                    	echo "selected";
                    } ?> >{{ $row->category_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="subcategory_id">
                     @foreach($subcategory as $row)
                    <option value="{{ $row->id }}" <?php if ($row->id == $product->subcategory_id) {
                    	echo "selected";
                    } ?> >{{ $row->subcategory_name }}</option>
                    @endforeach
                    
                  </select>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose country" name="brand_id">
                    <option label="Choose Brand"></option>
                    @foreach($brand as $br)
                    <option value="{{ $br->id }}" <?php if ($product->brand_id == $br->id) {
                    	echo "selected";
                    } ?> >{{ $br->brand_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label><br>
                  <input class="form-control" type="text" name="product_size" id="size" data-role="tagsinput" value="{{ $product->product_size }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label><br>
                  <input class="form-control lg-4" type="text" name="product_color" data-role="tagsinput" id="color" value="{{ $product->product_color }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Selling Price <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="selling_price"  placeholder="Selling Price" value="{{ $product->selling_price }}">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
              	<div class="form-group">
                  <label class="form-control-label">Product Details<span class="tx-danger">*</span></label>
                   <textarea class="form-control" id="summernote" name="product_details" >
                   	 {{ $product->product_details}}
                   </textarea>
                </div>	
              </div>
              <div class="col-lg-12">
              	<div class="form-group">
                  <label class="form-control-label">Video Link<span class="tx-danger">*</span></label>
                   <input class="form-control" placeholder="video link" name="video_link" value="{{ $product->video_link }}">
                </div>	
              </div>

             
            </div><!-- row -->
            <br><hr>
            <div class="row">
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="newarrivals_one" value="1" <?php if ($product->newarrivals_one == 1) {
					  	echo "checked";
					  }?> >
					  <span>New Arrivals One</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="newarrivals_two" value="1" <?php if ($product->newarrivals_two == 1) {
					  	echo "checked";
					  }?>>
					  <span>New Arrivals Two</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="newarrivals_three" value="1" <?php if ($product->newarrivals_three == 1) {
					  	echo "checked";
					  }?>>
					  <span>New Arrivals Three</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="newarrivals_four" value="1" <?php if ($product->newarrivals_four == 1) {
					  	echo "checked";
					  }?>>
					  <span>New Arrivals Four</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="newarrivals_five" value="1" <?php if ($product->newarrivals_five == 1) {
					  	echo "checked";
					  }?>>
					  <span>New Arrivals Five</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
      					  <input type="checkbox" name="latest_design" value="1" <?php if ($product->latest_design == 1) {
      					  	echo "checked";
      					  }?>>
      					  <span>Latest Design</span>
      					</label>
            	</div>

              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="special_offer" value="1" <?php if ($product->special_offer == 1) {
                    echo "checked";
                  }?>>
                  <span>Special Offer</span>
                </label>
              </div>

              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="collection" value="1" <?php if ($product->collection == 1) {
                    echo "checked";
                  }?>>
                  <span>Collection</span>
                </label>
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
               <h6 class="card-body-title">Update Product With Photo</h6>
               <form action="{{ url('update/product/photo/'.$product->id) }}" method="post" enctype="multipart/form-data">
               	@csrf
               <div class="row">
               	 <div class="col-lg-6 col-sm-6">
               	 	<lebel>Image One (Main Thumbnail 1)<span class="tx-danger">*</span></lebel><br>
              	     <label class="custom-file">
      				  <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL(this);"  accept="image">
      				  <span class="custom-file-control"></span>
      				   <input type="hidden" name="old_one" value="{{ $product->image_one }}">
      				  <img src="#" id="one" >
      				</label>
               	 </div>
               	 <div class="col-lg-6 col-sm-6">
               	 	<img src="{{ URL::to($product->image_one) }}" style="height: 80px; width: 80px;">
               	 </div>
               </div>

            <div class="row">
                 <div class="col-lg-6 col-sm-6">
                  <lebel>Image One (Main Thumbnail 2)<span class="tx-danger">*</span></lebel><br>
                     <label class="custom-file">
                <input type="file" id="file" class="custom-file-input" name="image_one_1" onchange="readURL1(this);"  accept="image">
                <span class="custom-file-control"></span>
                 <input type="hidden" name="old_one_1" value="{{ $product->image_one_1 }}">
                <img src="#" id="one_1" >
              </label>
                 </div>
                 <div class="col-lg-6 col-sm-6">
                  <img src="{{ URL::to($product->image_one_1) }}" style="height: 80px; width: 80px;">
                 </div>
               </div>

        	   <div class="row">
               	 <div class="col-lg-6 col-sm-6">
               	 	<lebel>Image Two <span class="tx-danger">*</span></lebel><br>
              	     <label class="custom-file">
      				  <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL2(this);"  accept="image">
      				  <input type="hidden" name="old_two" value="{{ $product->image_two }}">
      				  <span class="custom-file-control"></span>
      				  <img src="#" id="two" >
      				</label>
               	 </div>
               	 <div class="col-lg-6 col-sm-6">
               	 	<img src="{{ URL::to($product->image_two) }}" style="height: 80px; width: 80px;">
               	 </div>
               </div>
                <div class="row">
               	 <div class="col-lg-6 col-sm-6">
               	 	<lebel>Image Three <span class="tx-danger">*</span></lebel><br>
              	     <label class="custom-file">
      				  <input type="file" id="file" class="custom-file-input" name="image_three" onchange="readURL3(this);"  accept="image">
      				  <span class="custom-file-control"></span>
      				  <img src="#" id="three" >
      				   <input type="hidden" name="old_three" value="{{ $product->image_three }}">
      				</label>
               	 </div>
               	 <div class="col-lg-6 col-sm-6">
               	 	<img src="{{ URL::to($product->image_three) }}" style="height: 80px; width: 80px;">
               	 </div>
                </div>

                <div class="row">
                 <div class="col-lg-6 col-sm-6">
                  <lebel>Image Four<span class="tx-danger">*</span></lebel><br>
                     <label class="custom-file">
                <input type="file" id="file" class="custom-file-input" name="image_four" onchange="readURL4(this);"  accept="image">
                <span class="custom-file-control"></span>
                 <input type="hidden" name="old_four" value="{{ $product->image_four }}">
                <img src="#" id="four" >
              </label>
                 </div>
                 <div class="col-lg-6 col-sm-6">
                  <img src="{{ URL::to($product->image_four) }}" style="height: 80px; width: 80px;">
                 </div>
               </div>

               	 <button type="submit" class="btn btn-sm btn-warning">Update Photo</button>
               </form>

            
             
           </div>
       </div>
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
              $('#one_1')
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
	function readURL3(input) {
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
<script type="text/javascript">
  function readURL4(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#four')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
@endsection
