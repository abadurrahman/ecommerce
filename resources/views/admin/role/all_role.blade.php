@extends('admin.admin_layouts')
@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Admin Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Admin List
          	<a href="{{ route('create.admin') }}" class="btn btn-sm btn-warning" style="float: right;" >Add New</a>
          </h6>
          <br>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Name</th>
                   <th class="wd-15p">Phone</th> 
                   <th class="wd-15p">Access</th> 
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($user as $row)
                <tr>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->phone }}</td> 
                  <td>
                    @if($row->category == 1)
                         <span class="badge badge-danger">category</span>
                      @else
                      @endif   
                       @if($row->coupon == 1)
                         <span class="badge badge-success">coupon</span>
                      @else
                      @endif 
                  
                      @if($row->slider == 1)
                         <span class="badge badge-info">slider</span>
                      @else
                      @endif 
                  
                      @if($row->electronics == 1)
                         <span class="badge badge-warning">electronics</span>
                      @else
                      @endif 
                  
                      @if($row->subcategorypages == 1)
                         <span class="badge badge-primary">subcategorypages</span>
                      @else
                      @endif
                  
                      @if($row->products == 1)
                         <span class="badge badge-danger">products</span>
                      @else
                      @endif
                  
                      @if($row->blogs == 1)
                         <span class="badge badge-success">blogs</span>
                      @else
                      @endif
                       @if($row->orders == 1)
                         <span class="badge badge-danger">orders</span>
                      @else
                      @endif
                  
                      @if($row->others == 1)
                         <span class="badge badge-info">others</span>
                      @else
                      @endif
                  
                      @if($row->reports == 1)
                         <span class="badge badge-warning">reports</span>
                      @else
                      @endif
                  
                      @if($row->user_role == 1)
                         <span class="badge badge-primary">user_role</span>
                      @else
                      @endif
                  
                      @if($row->return_order == 1)
                         <span class="badge badge-danger">return_order</span>
                      @else
                      @endif
                  
                      @if($row->product_stock == 1)
                         <span class="badge badge-success">product_stock</span>
                      @else
                      @endif
                      @if($row->contact_message == 1)
                         <span class="badge badge-success">contact_message</span>
                      @else
                      @endif
                      @if($row->product_comment == 1)
                         <span class="badge badge-success">product_comment</span>
                      @else
                      @endif
                      @if($row->site_settings == 1)
                         <span class="badge badge-success">site_settings</span>
                      @else
                      @endif
                  
                  </td>
                  <td>
                  	<a href="{{ URL::to('edit/admin/'.$row->id) }}" class="btn btn-sm btn-info">edit</a>
                  	<a href="{{ URL::to('delete/admin/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">delete</a>
                  </td>
                 
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div><!-- sl-pagebody -->



@endsection