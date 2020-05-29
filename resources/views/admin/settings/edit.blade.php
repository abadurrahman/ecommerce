@extends('admin.admin_layouts')

@section('admin_content')


    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Product Section</span>
      </nav>
      <div class="sl-pagebody">
           <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title"> Post Update </h6>
          <p class="mg-b-20 mg-sm-b-30">Update Post </p>
          <form action="{{ url('update/setting/'.$setting->id) }}" method="post" enctype="multipart/form-data">
            @csrf
          
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Vat: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="vat"  value="{{ $setting->vat }}">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Shiping Charge: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="shipping_charge"  value="{{ $setting->shipping_charge }}">
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Shop Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="shopname"  value="{{ $setting->shopname }}">
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="email"  value="{{ $setting->email }}">
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone"  value="{{ $setting->phone }}">
                </div>
              </div>

               <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="address"  value="{{ $setting->address }}">
                </div>
              </div>

        

              <div class="col-lg-4">
                <lebel>Logo<span class="tx-danger">*</span></lebel>
                <label class="custom-file">
                <input type="file" id="file" class="custom-file-input" name="logo" onchange="readURL(this);"  accept="image">
                <span class="custom-file-control"></span>
                <img src="#" id="one" >
              </label>
              </div>
              <div class="col-lg-4">
                <lebel>Old Logo<span class="tx-danger">*</span></lebel>
                <label class="custom-file">
                <img src="{{ URL::to($setting->logo) }}" style="height: 80px; width: 140px;" >
                <input type="hidden" name="old_logo" value="{{ $setting->logo }}">
              </label>
              </div>
             
            </div>
            <br>
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Update </button>
            </div>
          </div>
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

@endsection
 