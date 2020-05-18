@extends('admin.admin_layouts')
@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Slider Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Slider List </h6>
          <br>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  
                  <th class="wd-15p">Image One</th>
                  <th class="wd-15p">Image Two</th>
                  <th class="wd-15p">Image Three</th>
                  <th class="wd-15p">Status</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($slider as $row)
                <tr>
                  
                  <td><img src="{{ URL::to($row->image_one) }}" height="50px;" width="50px;"></td>
                  <td><img src="{{ URL::to($row->image_two) }}" height="50px;" width="50px;"></td>
                  <td><img src="{{ URL::to($row->image_three) }}" height="50px;" width="50px;"></td>
                  <td>
                  	@if($row->status == 1)
                  	 <span class="badge badge-success">Active</span>
                  	@else
                  	<span class="badge badge-danger">Inactive</span>
                  	@endif
                  </td>
                  <td>
                  	<a href="{{ URL::to('edit/slider/'.$row->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                  	<a href="{{ URL::to('delete/slider/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                  	<a href="{{ URL::to('view/slider/'.$row->id) }}" class="btn btn-sm btn-warning" title="view"><i class="fa fa-eye"></i></a>

                  	@if($row->status == 1)
                  		<a href="{{ URL::to('inactive/slider/'.$row->id) }}" class="btn btn-sm btn-danger" title="Inactive"><i class="fa fa-thumbs-down"></i></a>
                  	@else
                  		<a href="{{ URL::to('active/slider/'.$row->id) }}" class="btn btn-sm btn-success" title="Active"><i class="fa fa-thumbs-up"></i></a>
                  	@endif
                  	
                  </td>
                 
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div><!-- sl-pagebody -->
  </div>



@endsection