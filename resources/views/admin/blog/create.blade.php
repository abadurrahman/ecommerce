 @extends('admin.admin_layouts')

@section('admin_content')



    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Product Section</span>
      </nav>
      <div class="sl-pagebody">
           <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">New Post Add <a href="{{route('all.blogpost')}}" class="btn btn-info btn-sm pull-right">All Post</a></h6>
          <p class="mg-b-20 mg-sm-b-30">New Post add form</p>
          <form action="{{ route('store.post') }}" method="post" enctype="multipart/form-data">
            @csrf
          
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Post Title (ENGLISH ): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_en"  >
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Post Title (BANGLA ): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_bn"  >
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Post Title (CHINA ): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_cn"  >
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Post Title (HINDI ): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_hn"  >
                </div>
              </div>
             
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose Category" name="category_id">
                    <option label="Choose Category"></option>
                    @foreach($category as $row)
                    <option value="{{ $row->id }}">{{ $row->category_name_en }}</option>
                    @endforeach
                    <!-- @foreach($category as $row)
                    <option value="{{ $row->id }}">{{ $row->category_name_bn }}</option>
                    @endforeach
                                       @foreach($category as $row)
                                       <option value="{{ $row->id }}">{{ $row->category_name_cn }}</option>
                                       @endforeach
                                       @foreach($category as $row)
                                       <option value="{{ $row->id }}">{{ $row->category_name_hn }}</option>  -->
                    @endforeach
                  </select>
                </div>
              </div>
              
            
            

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Details (English)<span class="tx-danger">*</span></label>
                   <textarea class="form-control" id="summernote" name="details_en">
                     
                   </textarea>
                </div>  
              </div>

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Details (Bangla)<span class="tx-danger">*</span></label>
                   <textarea class="form-control" id="summernote1" name="details_bn">
                     
                   </textarea>
                </div>  
              </div>

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Details (China)<span class="tx-danger">*</span></label>
                   <textarea class="form-control" id="summernote2" name="details_cn">
                     
                   </textarea>
                </div>  
              </div>

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Details (Hindi)<span class="tx-danger">*</span></label>
                   <textarea class="form-control" id="summernote3" name="details_hn">
                     
                   </textarea>
                </div>  
              </div>
             

              <div class="col-lg-4">
                <lebel>Post Image (Main Thumbnail)<span class="tx-danger">*</span></lebel>
                <label class="custom-file">
                <input type="file" id="file" class="custom-file-input" name="post_image" onchange="readURL(this);" required="" accept="image">
                <span class="custom-file-control"></span>
                <img src="#" id="one" >
              </label>
              </div>
          </div>
           <div class="col-lg-4">
                <label class="ckbox">
            <input type="checkbox" name="main" value="1">
            <span>Main</span>
          </label>
              </div>
            <div class="col-lg-4">
                <label class="ckbox">
            <input type="checkbox" name="latest_offer" value="1">
            <span>Latest Offer</span>
          </label>
              </div>
            <hr>
          
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Submit </button>
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
 