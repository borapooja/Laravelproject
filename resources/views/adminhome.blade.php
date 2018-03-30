@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
       @if(Session::has('admin-success'))
    <div class="alert alert-success" id="confirm">
      <span>{{session()->get('admin-success')}}</span>
    </div>
                    @endif
      @if(Session::has('delete-success'))
    <div class="alert alert-success" id="confirm">
      <span>{{session()->get('delete-success')}}</span>
    </div>
          @endif
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>
        <div class="panel-body">
          @if (session('status'))
          <div class="alert alert-success">
          {{ session('status') }}
          </div>
        @endif
          <div align="right">
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
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
