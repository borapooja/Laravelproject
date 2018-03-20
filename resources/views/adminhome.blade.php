@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
                    @endif
                  <div class="alert alert-success">
                    You're Logged in As Admin.
                  </div>
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
                            <td><input type="submit" name="Edit" value="Edit" class="btn btn-success">||<input type="submit" name="Delete" value="Delete" class="btn btn-success"></td>
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
