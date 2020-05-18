@extends('admin.admin_layouts')

@section('admin_content')
 


  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Tag Table</h5>
        </div><!-- sl-page-title -->


        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Tag List
          <a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add New</a>
          </h6>
           

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Tag Name</th>
                  <th class="wd-20p">Action</th>               
                </tr>
              </thead>
              <tbody>
              	@foreach($tag as $row)
                <tr>
                  <td>{{$row->id}}</td>
                  <td>{{$row->tag_name}}</td>
                  <td>
                  	<a href="{{ URL::to('edit/tag/'.$row->id) }}" class="btn btn-sm btn-info">edit</a>
                  	<a href="{{ URL::to('delete/tag/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">delete</a>
                  </td>               
                </tr>   
                @endforeach         
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->    
   
           <!--modal-->
        <!-- LARGE MODAL -->
        <div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Tag Add</h6>
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
               <form method="post" action="{{ route('store.tag') }}">
              @csrf
              <div class="modal-body pd-20">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tag Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tag" name="tag_name">
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