@extends('admin.admin_layouts')

@section('admin_content')



    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Product Section</span>
      </nav>
      <div class="sl-pagebody">
      	   <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Edit Admin  </h6>
          <p class="mg-b-20 mg-sm-b-30"> Admin Edit form</p>
          <form action="{{ route('update.admin') }}" method="post" >
          	@csrf
          <input type="hidden" name="id" value="{{ $user->id }}">
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"> Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="name"  required="" value="{{ $user->name }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone"  required="" value="{{ $user->phone }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Email <span class="tx-danger">*</span></label>
                  <input class="form-control" type="email" name="email"  required="" value="{{ $user->email }}">
                </div>
              </div><!-- col-4 -->

            </div><!-- row -->
            <br><hr>
            <div class="row">
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="category" value="1"   <?php  if ($user->category == 1) {
					        	echo "checked";
					  }  ?>  >
					  <span>Category</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="coupon" value="1"  <?php  if ($user->coupon == 1) {
					        	echo "checked";
					  }  ?>>
					  <span>Coupon</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="slider" value="1"  <?php  if ($user->slider == 1) {
					        	echo "checked";
					  }  ?>>
					  <span>Slider</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="blogs" value="1"  <?php  if ($user->blogs == 1) {
					        	echo "checked";
					  }  ?>>
					  <span>blogs</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="subcategorypages" value="1"  <?php  if ($user->subcategorypages == 1) {
					        	echo "checked";
					  }  ?>>
					  <span>Order</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
      					  <input type="checkbox" name="products" value="1"  <?php  if ($user->products == 1) {
					        	echo "checked";
					  }  ?>>
      					  <span>Products</span>
      					</label>
            	</div>

              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="electronics" value="1"  <?php  if ($user->electronics == 1) {
					        	echo "checked";
					  }  ?>>
                  <span>electronics</span>
                </label>
              </div>

              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="orders" value="1"  <?php  if ($user->orders == 1) {
					        	echo "checked";
					  }  ?>>
                  <span>Orders</span>
                </label>
              </div>
            
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="others" value="1" <?php  if ($user->others == 1) {
					        	echo "checked";
					  }  ?>>
                  <span>Others</span>
                </label>
              </div>
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="reports" value="1" <?php  if ($user->reports == 1) {
					        	echo "checked";
					  }  ?>>
                  <span>Reports</span>
                </label>
              </div>

              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="user_role" value="1" <?php  if ($user->user_role == 1) {
					        	echo "checked";
					  }  ?>>
                  <span>user_role</span>
                </label>
              </div>

               <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="product_stock" value="1" <?php  if ($user->product_stock == 1) {
                    echo "checked";
            }  ?>>
                  <span>product_stock</span>
                </label>
              </div>

              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="contact_message" value="1" <?php  if ($user->contact_message == 1) {
                    echo "checked";
            }  ?>>
                  <span>contact_message</span>
                </label>
              </div>
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="product_comment" value="1" <?php  if ($user->product_comment == 1) {
                    echo "checked";
            }  ?>>
                  <span>product_comment</span>
                </label>
              </div>
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="site_settings" value="1" <?php  if ($user->site_settings == 1) {
                    echo "checked";
            }  ?>>
                  <span>site_settings</span>
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
    </div><!-- sl-mainpanel -->




@endsection
