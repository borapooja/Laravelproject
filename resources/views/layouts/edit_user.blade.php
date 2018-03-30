@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Edit</div>
          <div class="panel-body">
            
            <form class="form-horizontal" method="POST" action="/update-data/{{ $data['id']}}">
                {{ csrf_field() }}
             
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name</label>
                  <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ $data['name']}}" placeholder="Enter Name" required autofocus>

                        @if ($errors->has('name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                      @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email" class="col-md-4 control-label">E-Mail Address
                  </label>
                  <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ $data['email']}}" placeholder="Enter Email Id" required>

                      @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                  <label for="mobile" class="col-md-4 control-label">Mobile Number </label>
                  <div class="col-md-6">
                    <input id="mobile" type="number" class="form-control" name="mobile" value="{{ $data['mobile']}}" placeholder="Enter Mobile Number" required>

                    @if ($errors->has('mobile'))
                      <span class="help-block">
                        <strong>{{ $errors->first('mobile') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                    <a href="/home">
                      <button type="button" class="btn btn-default">
                        Back
                      </button>
                    </a>
                  </div>
                </div>
                
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
