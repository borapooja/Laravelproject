@include('layouts.header')
@include('layouts.navigation')
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-header">
             Register 
        </h1>
      <!--   <div class="panel-heading"></div> -->
        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="/register-data">
                    {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name" class="col-md-4 control-label">Name*</label>
              <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Enter Name">

                @if ($errors->has('name'))
                  <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="col-md-4 control-label">E-Mail Address*</label>
              <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Enter Email">

                            @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                            @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('admin') ? ' has-error' : '' }}">
              <label for="role" class="col-md-4 control-label">Role*</label>
              <div class="col-md-6">
                <input type="radio" name="role" id="role" value="1">admin </b>
                <input type="radio" name="role" id="role" value="0" checked>user </b>
                <input type="radio" name="role" id="role" value="2">employee </br>
                <!-- <select id="role"  class="form-control" name="role" 
                  placeholder="Enter role" required>
                  <option>Select</option>
                  <option value= "0">User</option>
                  <option value= "1">Admin</option>
                  <option value= "2">Employee</option>
                </select> -->
                            @if ($errors->has('role'))
                <span class="help-block">
                  <strong>{{ $errors->first('role') }}</strong>
                </span>

                            @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
              <label for="mobile" class="col-md-4 control-label">Mobile Number*</label>

              <div class="col-md-6">
                <input id="mobile" type="number" class="form-control" name="mobile" value="{{ old('mobile') }}" placeholder="Enter Mobile Number" required>

                  @if ($errors->has('mobile'))
                  <span class="help-block">
                    <strong>{{ $errors->first('mobile') }}</strong>
                  </span>
                  @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="col-md-4 control-label">Password*</label>
              <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" placeholder="Enter Password" required>

                    @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                    @endif
              </div>
            </div>

            <div class="form-group">
              <label for="password-confirm" class="col-md-4 control-label">Confirm Password*</label>
              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password"required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Register
                </button>
                <a href="/home"><button type="button" class="btn btn-default">
                    Back
                </button></a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@include('layouts.footer')