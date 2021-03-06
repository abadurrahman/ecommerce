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
        
          <p class="mg-b-20 mg-sm-b-30">Product Details</p>
         
          
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">product name <span class="tx-danger">*</span></label>
                  <br>
                  <strong>{{ $electronic->product_name }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                   <br>
                  <strong>{{ $electronic->product_code }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity <span class="tx-danger">*</span></label>
                  <br>
                  <strong>{{ $electronic->product_quantity }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                   <br>
                  <strong>{{ $electronic->category_name }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                   <br>
                  <strong>{{ $electronic->subcategory_name }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                   <br>
                  <strong>{{ $electronic->brand_name }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                 <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                  <br>
                  <strong>{{ $electronic->product_size }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label><br>
                  <strong>{{ $electronic->product_color }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Selling Price <span class="tx-danger">*</span></label>
                   <br>
                  <strong>{{ $electronic->selling_price }}</strong>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
              	<div class="form-group" style="border:1px solid grey;padding:10px; ">
                  <label class="form-control-label">Product Details<span class="tx-danger">*</span></label>
                    <br>
                  <p >{!! $electronic->product_details !!}</p>
                </div>	
              </div>
              

              <div class="col-lg-4">
              	<lebel>Image One (Main Thumbnail)<span class="tx-danger">*</span></lebel>
              	<label class="custom-file">
				  
				  <img src="{{ URL::to($electronic->image_one) }}" style="height: 80px; width: 80px;" >
				</label>
              </div>
              <div class="col-lg-4">
              	<lebel>Image Two <span class="tx-danger">*</span></lebel>
              	<label class="custom-file">
				  <img src="{{ URL::to($electronic->image_two) }}" style="height: 80px; width: 80px;" >
				</label>
              </div>
              <div class="col-lg-4">
              	<lebel>Image Three <span class="tx-danger">*</span></lebel>
              	<label class="custom-file">
				  <img src="{{ URL::to($electronic->image_three) }}" style="height: 80px; width: 80px;" >
				</label>
              </div>
            </div><!-- row -->
            <br><hr>
            <div class="row">
            	<div class="col-lg-4">
            		<label class="">
            		@if($electronic->product_one == 1)
					  <span class="badge badge-success">Active</span> |
					@else
					<span class="badge badge-danger">Inactive</span> |
					@endif
					  <span>Product One</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label >
					  @if($electronic->product_two == 1)
					  <span class="badge badge-success">Active</span> |
					@else
					<span class="badge badge-danger">Inactive</span> |
					@endif
					  <span>Product Two</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="">
					  @if($electronic->product_three == 1)
					  <span class="badge badge-success">Active</span> |
					@else
					<span class="badge badge-danger">Inactive</span> |
					@endif
					  <span>Product Three</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="">
					  @if($electronic->product_four == 1)
					  <span class="badge badge-success">Active</span> |
					@else
					<span class="badge badge-danger">Inactive</span> |
					@endif
					  <span>Product Four</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="">
					  @if($electronic->latest_product == 1)
					  <span class="badge badge-success">Active</span> |
					@else
					<span class="badge badge-danger">Inactive</span> |
					@endif
					  <span>Latest Product</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="">
					  @if($electronic->hot_new == 1)
					  <span class="badge badge-success">Active</span> |
					@else
					<span class="badge badge-danger">Inactive</span> |
					@endif
					  <span>Hot New</span>
					</label>
            	</div>
            </div>


        </div><!-- card -->
       
      </div><!-- sl-pagebody --> 
    </div><!-- sl-mainpanel -->





@endsection
