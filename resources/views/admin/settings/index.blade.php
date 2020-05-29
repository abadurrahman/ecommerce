@extends('admin.admin_layouts')
@section('admin_content')
  ########## START: MAIN PANEL ##########
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Post Table</h5>
        </div>

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Post List </h6>
          <br>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Shop Name</th>
                  <th class="wd-15p">ShippingCharge</th>
                  <th class="wd-15p">Logo</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($detail as $row)
                <tr>
                  <td>{{ $row->shopname }}</td>
                  <td>{{ $row->shipping_charge }}</td>
                  <td><img src="{{ URL::to($row->logo) }}" height="50px;" width="50px;"></td>
                  <td>
                  	<a href="{{ URL::to('edit/setting/'.$row->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                  	<a href="{{ URL::to('delete/setting/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                  </td>
                 
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>



@endsection 