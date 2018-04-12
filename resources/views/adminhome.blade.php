@include('layouts.header')
@include('layouts.navigation')

  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-header">
             Dashboard 
        </h1>
        <div class="panel-body">
          @if (session('status'))
          <div class="alert alert-success">
          {{ session('status') }}
          </div>
        @endif
          <div align="right">
            <!-- <a href="/display-dashboard"> -->
               <button type="button" id="add_setting" name="add_setting" class="btn btn-info">Settings</button>
           <!--  </a> -->
              <button type="button" id="add_role" name="add_role" align= "right" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Role</button>
            
            <a href="/register-user">
              <button type="button" id="add_new" name="add_new" align= "right" class="btn btn-success">Add User</button>
            </a>
          </div><br>
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Role</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($users as $key => $value)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->mobile }}</td>
                <td>@if ($value->admin == 1) 
                  <span class="label label-info">admin</span> @else
                  <span class="label label-default"> user</span> @endif
                </td>
                <td>
                  <a href="/edit-user/{{$value->id}}" class="btn btn-success">Edit</a> 
                  <a href="/delete_data/{{$value->id}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete ?')">Delete
                  </a>
                  @if($value->active == 0)
                  <a href="/block-user/{{$value->id}}" class="btn btn-primary" onclick="return confirm('Are you sure you want to Block this user ?')"> Block
                  </a>
                @else
                  <a href="/unblock-user/{{$value->id}}" class="btn btn-warning" onclick="return confirm('Are you sure you want to Unblock this user ?')"> Unblock</a>
                @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $users->links('auth.pagination') !!}
        </div>
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Role</h4>
              </div>
              <div class="modal-body">
                <div class="col-md-12">
                <div class="col-md-4"><label>Name : </label></div>
                  <div class="col-md-6">
                    <input type="text" name="createrole" id="createrole" class="form-control" placeholder="Enter role name">
                </div>
              </div><br><br>
              <div class="" align="right">
                <button type="button" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
@include('layouts.footer')