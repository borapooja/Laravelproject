
@include('layouts.header')
@include('layouts.navigation')
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-header">
             Manage Profile
        </h1>
        
        <div class="panel-body">
          @if (session('error'))
          <div class="alert alert-danger">
            {{ session('error') }}
          </div>
          @endif
          @if (session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
          @endif
          <form class="form-horizontal" method="POST" action="/manage-detail">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="Name" class="col-md-4 control-label">Name :</label>
              <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" placeholder="Enter Name" value="{{ Auth::user()->name}}" required>
                @if ($errors->has('name'))
                <span class="help-block">
                  <strong>{{ $errors->first('Name') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="Email" class="col-md-4 control-label">Email :</label>
              <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" placeholder="Enter Email" value="{{ Auth::user()->email}}" required>
                @if ($errors->has('Email'))
                <span class="help-block">
                  <strong>{{ $errors->first('Email') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="mobile" class="col-md-4 control-label">Mobile :</label>
              <div class="col-md-6">
                <input id="mobile" maxlength="10" minlength="10" class="form-control" 
                      onkeypress='validate(event)' value="{{ Auth::user()->mobile}}" class="form-control" name="mobile" placeholder="Enter Mobile" required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-success">
                  Update
                </button>
                <a href="/home">
                  <button type="button" class="btn btn-default">
                    Cancel
                  </button>
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@include('layouts.footer')
