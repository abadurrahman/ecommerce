@extends('admin.admin_layouts')
@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Category Update</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Category Update
          	
          </h6>
          <br>
          <div class="table-wrapper">
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
            <form method="post" action="{{ url('update/postcategory/'.$postcategory->id) }}">
              @csrf
              <div class="modal-body pd-20">
                <div class="form-group">
                	{{-- <input type="hidden" name="id" value="{{$postcategory_id }}"> --}}
                  <label for="exampleInputEmail1">Category Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $postcategory->category_name_en }}" name="category_name_en">
                </div>
                <div class="form-group">
                  {{-- <input type="hidden" name="id" value="{{$postcategory_id }}"> --}}
                  <label for="exampleInputEmail1">Category Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $postcategory->category_name_bn }}" name="category_name_bn">
                </div>
                <div class="form-group">
                  {{-- <input type="hidden" name="id" value="{{$postcategory_id }}"> --}}
                  <label for="exampleInputEmail1">Category Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $postcategory->category_name_cn }}" name="category_name_cn">
                </div>
                <div class="form-group">
                  {{-- <input type="hidden" name="id" value="{{$postcategory_id }}"> --}}
                  <label for="exampleInputEmail1">Category Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $postcategory->category_name_hn }}" name="category_name_hn">
                </div>
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Update</button>
              </div>
            </form>
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div><!-- sl-pagebody -->
@endsection