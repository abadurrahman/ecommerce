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
          <h6 class="card-body-title">New Admin  </h6>
          <p class="mg-b-20 mg-sm-b-30">New Admin add form</p>
          <form action="{{ route('store.admin') }}" method="post" >
          	@csrf
          
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label"> Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="name"  required="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone"  required="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Email <span class="tx-danger">*</span></label>
                  <input class="form-control" type="email" name="email"  required="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Password <span class="tx-danger">*</span></label>
                  <input class="form-control" type="password" name="password"  required="">
                </div>
              </div><!-- col-4 -->
             

            </div><!-- row -->
            <br><hr>
            <div class="row">
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="category" value="1">
					  <span>Category</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="coupon" value="1">
					  <span>Coupon</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="slider" value="1">
					  <span>Slider</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="electronics" value="1">
					  <span>Electronics</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="subcategorypages" value="1">
					  <span>Subcategorypages</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
      					  <input type="checkbox" name="products" value="1">
      					  <span>Products</span>
      					</label>
            	</div>

              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="blogs" value="1">
                  <span>Blogs</span>
                </label>
              </div>

              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="orders" value="1">
                  <span>Orders</span>
                </label>
              </div>
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="others" value="1">
                  <span>Others</span>
                </label>
              </div>
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="reports" value="1">
                  <span>Reports</span>
                </label>
              </div>
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="user_role" value="1">
                  <span>User Role</span>
                </label>
              </div>
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="return_order" value="1">
                  <span>Return Order</span>
                </label>
              </div>
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="product_stock" value="1">
                  <span>Product Stock</span>
                </label>
              </div>
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="contact_message" value="1">
                  <span>Contact Message</span>
                </label>
              </div>
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="product_comment" value="1">
                  <span>Product Comment</span>
                </label>
              </div>
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="site_settings" value="1">
                  <span>Site Settings</span>
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




@endsection
