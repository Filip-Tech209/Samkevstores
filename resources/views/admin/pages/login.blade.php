<!DOCTYPE html>
<html lang="en">
@include('admin.lib.head')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>SAMKEV</b>STORES</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
        @if(Session::has('success')) 
            <div class="alert alert-success ">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Success</h5>
                <p class="toast-message">You are now logged in </P>
            </div>
        @endif
        @if(Session::has('success'))
            <div class="alert alert-success ">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Success</h5>
                <p class="toast-message">Click <a href="{{'/login'}}" class="btn btn-block btn-light" style="text-decoration:none; color:black">{{Session::get('success')}}  </a> to continue</p>
            </div>
        @elseif(Session::has('error'))
            <p class="login-box-msg" style="font-weight:bolder;color:red;">{{Session::get('error')}}</p>
            <form action="{{url('/login-user')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <p class="text-danger">@error('email'){{$message}}@enderror</p>
                <div class="input-group mb-3">
                    <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <p class="text-danger">@error('password'){{$message}}@enderror</p>
                <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                    <!-- <input type="checkbox" id="remember"> -->
                    <label for="remember">
                    <a href="{{url('/forgot-password')}}" class="text-center">Forgot Password?</a>
                    </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <!-- /.col -->
                </div>
            </form>
            <p class="mb-0">
                Don`t have an account? <a href="{{url('/register')}}" class="text-center">Sign Up Now</a>
            </p>
        @else
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="{{url('/login-user')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <p class="text-danger">@error('email'){{$message}}@enderror</p>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <p class="text-danger">@error('password'){{$message}}@enderror</p>

                <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                    <!-- <input type="checkbox" id="remember"> -->
                    <label for="remember">
                        <a href="{{url('/forgot-password')}}" class="text-center">Forgot Password?</a>
                    </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <!-- /.col -->
                </div>
            </form>
            <p class="mb-0">
                Don`t have an account? <a href="{{url('/register')}}" class="text-center">Sign Up Now</a>
            </p>
        @endif
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
@include('admin.lib.javascript')
</body>
</html>
