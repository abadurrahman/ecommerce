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
        
          <p class="mg-b-20 mg-sm-b-30">Slider Details</p>
         
          
          <div class="form-layout">
            <div class="row mg-b-25">
              

              <div class="col-lg-4">
              	<lebel>Image One<span class="tx-danger">*</span></lebel>
              	<label class="custom-file">
				  
				       <img src="{{ URL::to($slider->image_one) }}" style="height: 80px; width: 80px;" >
				      </label>
              </div>

              <div class="col-lg-4">
                <lebel>Image Two<span class="tx-danger">*</span></lebel>
                <label class="custom-file">
          
               <img src="{{ URL::to($slider->image_two) }}" style="height: 80px; width: 80px;" >
              </label>
              </div>

              <div class="col-lg-4">
                <lebel>Image Three<span class="tx-danger">*</span></lebel>
                <label class="custom-file">
          
               <img src="{{ URL::to($slider->image_three) }}" style="height: 80px; width: 80px;" >
              </label>
              </div>

            <br><br><br><br><br><hr>


            <div class="row">
            	<div class="col-lg-4">
            		<label class="">
            		@if($slider->main_slider_one == 1)
					  <span class="badge badge-success">Active</span> |
					@else
					<span class="badge badge-danger">Inactive</span> |
					@endif
					  <span>Main Slider one</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label >
					  @if($slider->main_slider_two == 1)
					  <span class="badge badge-success">Active</span> |
					@else
					<span class="badge badge-danger">Inactive</span> |
					@endif
					  <span>Main Slider two</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="">
					  @if($slider->mens_slider_one == 1)
					  <span class="badge badge-success">Active</span> |
					@else
					<span class="badge badge-danger">Inactive</span> |
					@endif
					  <span>Mens Slider One</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="">
					  @if($slider->mens_slider_two == 1)
					  <span class="badge badge-success">Active</span> |
					@else
					<span class="badge badge-danger">Inactive</span> |
					@endif
					  <span>Mens Slider Two</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="">
					  @if($slider->womens_slider_one == 1)
					  <span class="badge badge-success">Active</span> |
					@else
					<span class="badge badge-danger">Inactive</span> |
					@endif
					  <span>Womens Slider One</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="">
					  @if($slider->womens_slider_two == 1)
					  <span class="badge badge-success">Active</span> |
					@else
					<span class="badge badge-danger">Inactive</span> |
					@endif
					  <span>Womens Slider Two</span>
					</label>
            	</div>
              
              <div class="col-lg-4">
                <label class="">
            @if($slider->electronics_slider == 1)
            <span class="badge badge-success">Active</span> |
          @else
          <span class="badge badge-danger">Inactive</span> |
          @endif
            <span>Electronics Slider</span>
          </label>
              </div>
              <div class="col-lg-4">
                <label class="">
            @if($slider->blog_slider == 1)
            <span class="badge badge-success">Active</span> |
          @else
          <span class="badge badge-danger">Inactive</span> |
          @endif
            <span>Blog Slider</span>
          </label>
              </div>
              <div class="col-lg-4">
                <label class="">
            @if($slider->contact_slider == 1)
            <span class="badge badge-success">Active</span> |
          @else
          <span class="badge badge-danger">Inactive</span> |
          @endif
            <span>Contact Slider</span>
          </label>
              </div>
             
            </div>


        </div><!-- card -->
       
      </div><!-- sl-pagebody --> 
    </div><!-- sl-mainpanel -->





@endsection
