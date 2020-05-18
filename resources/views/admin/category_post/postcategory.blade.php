@extends('admin.admin_layouts')
@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Category Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Category List
          	<a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add New</a>
          </h6>
          <br>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Category Name En</th>
                  <th class="wd-15p">Category Name Bn</th>
                  <th class="wd-15p">Category Name Hn</th>
                
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($postcategory as $row)
                <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->category_name_en }}</td>
                  <td>{{ $row->category_name_bn }}</td>
                  <td>{{ $row->category_name_hn }}</td>
                  
                  <td>
                  	<a href="{{ URL::to('edit/postcategory/'.$row->id) }}" class="btn btn-sm btn-info">edit</a>
                  	<a href="{{ URL::to('delete/postcategory/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">delete</a>
                  </td>
                 
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div><!-- sl-pagebody -->


<!--modal-->
        <!-- LARGE MODAL -->
        <div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Post Category Add</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
            <form method="post" action="{{ route('store.postcategory') }}">
              @csrf
              <div class="modal-body pd-20">
                <div class="form-group">
                  <label for="exampleInputEmail1">Category Name En</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Category" name="category_name_en">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Category Name Bn</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Category" name="category_name_bn">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Category Name Cn</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Category" name="category_name_cn">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Category Name Hn</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Category" name="category_name_hn">
                </div>
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
            </form>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->
@endsection