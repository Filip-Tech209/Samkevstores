<!DOCTYPE html>
<html lang="en">
@include('admin.lib.head')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>SAMKEV</b>STORES</a>
  </div>

  @if(Session::has('success'))

  @endif
    <div class="card">
        <div class="card-body login-card-body">
            @if(Session::has('success')) 
                <div class="alert alert-success ">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success</h5>
                  <p class="toast-message">{{Session::get('success')}}  <a href="{{'/login'}}" class="btn btn-block btn-light" style="text-decoration:none; color:black">Login</a> to continue</p>
                </div>
            @elseif(Session::has('fail'))
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Failed!</h5>
                  {{Session::get('fail')}}
                </div>
                <p class="login-box-msg">Register New Account</p>
                <form action="{{url('/register-user')}}" id="registerForm" method="post"> 
                    @csrf
                        <div class="input-group mb-3">
                        <input type="text" name="firstName" value="{{old('firstName')}}" class="form-control" placeholder="First Name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-user"></span>
                            </div>
                        </div>
                        </div>
                        <p class="text-danger">@error('firstName'){{$message}}@enderror</p>

                        <div class="input-group mb-3">
                        <input type="text" name="lastName" class="form-control" placeholder="Last Name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-user"></span>
                            </div>
                        </div>
                        </div>
                        <p class="text-danger">@error('lastName'){{$message}}@enderror</p>

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
                        <input type="text" 
                                id="phone_number" 
                                maxlength="15" 
                                pattern="^\+\d{6,14}$" class="form-control"  name="phone" 
                                placeholder="Enter your Phone number (e.g., +971xxxxxxxxx)" 
                                required
                            >
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                            </div>
                        </div>
                        </div>
                        <p class="text-danger">@error('phone'){{$message}}@enderror</p>

                        <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        </div>
                        <p class="text-danger">@error('password'){{$message}}@enderror</p>

                        <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        </div>
                        <p class="text-danger">@error('password_confirmation'){{$message}}@enderror</p>

                        <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms">
                            I agree to the <a href="#">terms</a>
                            </label>
                            </div>
                        </div>
                        <p class="text-danger">@error('terms'){{$message}}@enderror</p>

                        <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                </form>
                <p class="mb-0">
                    Already have an Account? <a href="{{url('/login')}}" class="text-center">Sign In</a>
                </p>
            @else
                <p class="login-box-msg">Check Your Details and try again</p>
                <form action="{{url('/register-user')}}" id="registerForm" method="post"> 
                    @csrf
                        <div class="input-group mb-3">
                        <input type="text" name="firstName" value="{{old('firstName')}}" class="form-control" placeholder="First Name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-user"></span>
                            </div>
                        </div>
                        </div>
                        <p class="text-danger">@error('firstName'){{$message}}@enderror</p>

                        <div class="input-group mb-3">
                        <input type="text" name="lastName"value="{{old('lastName')}}" class="form-control" placeholder="Last Name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-user"></span>
                            </div>
                        </div>
                        </div>
                        <p class="text-danger">@error('lastName'){{$message}}@enderror</p>

                        <div class="input-group mb-3">
                        <input type="email" name="email" value="{{old('email')}}"class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        </div>
                        <p class="text-danger">@error('email'){{$message}}@enderror</p>

                        <div class="input-group mb-3">
                        <input type="text" 
                                id="phone_number" 
                                maxlength="15" 
                                pattern="^\+\d{6,14}$" class="form-control"  name="phone" 
                                placeholder="Enter your Phone number (e.g., +971xxxxxxxxx)" 
                                required
                                value="{{old('phone')}}"
                            >
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                            </div>
                        </div>
                        </div>
                        <p class="text-danger">@error('phone'){{$message}}@enderror</p>

                        <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        </div>
                        <p class="text-danger">@error('password'){{$message}}@enderror</p>

                        <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        </div>
                        <p class="text-danger">@error('password_confirmation'){{$message}}@enderror</p>

                        <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms">
                            I agree to the <a href="#">terms</a>
                            </label>
                            </div>
                        </div>
                        <p class="text-danger">@error('terms'){{$message}}@enderror</p>

                        <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                </form>
                <p class="mb-0">
                    Already have an Account? <a href="{{url('/login')}}" class="text-center">Sign In</a>
                </p>
            @endif
        </div>
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
@include('admin.lib.javascript')
</body>

<!-- handle phone number -->
    <script>
        document.getElementById('registerForm').onsubmit = function(event) {
            const phoneNumber = document.getElementById('phone_number').value;
        
            // Ensure phone number starts with + and contains 6 to 14 digits
            const phoneRegex = /^\+\d{6,14}$/;
            if (!phoneRegex.test(phoneNumber)) {
                alert("Please enter a valid phone number in the format: +CountryCodePhoneNumber (e.g., +254700000000).");
                event.preventDefault(); // Prevent form submission
            }
        };
        
        document.getElementById('phone_number').addEventListener('input', function() {
            // Allow only '+' at the start and digits
            this.value = this.value.replace(/(?!^\+)[^\d]/g, '');
        });

    </script>
<!-- toaster styles -->
    <style>
                
        .toast {
            display: flex;
            align-items: center;
            position: fixed;
            top: 70px;
            right: 20px;
            padding: 10px 20px;
            border-radius: 0px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            font-family: Arial, sans-serif;
            font-size: 14px;
            z-index: 1000;
            opacity: 0;
            transform: translateY(-20px);
            transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        #toast-success {
            background-color: #28a745; /* Green for success */
            color: white;
        }

        #toast-warning {
            background-color: #ffc107; /* yellow for success */
            color: white;
        }

        #toast-error {
            background-color: #dc3545; /* Red for error */
            color: white;
        }

        .toast-icon {
            margin-right: 10px;
            font-size: 18px;
        }

        .toast-message {
            flex: 1;
        }
    </style>
</html>
