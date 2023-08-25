@extends('auth.layouts.master')
@section('title','Giriş Yap')
@section('customStyle')
@endsection


@section('content')
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card" style="background-size:cover;">
                    <div>
                        <div><a class="logo" href="index.html"><img class="img-fluid for-light" src="{{asset('assets/images/logo/logo2.png')}}"
                                                                    alt="looginpage"></a></div>
                        <div class="login-main">
                            <form class="theme-form" action="{{route('login')}}" method="POST">
                                @csrf


                                <h4 class="text-center">Sign in to account</h4>
                                <p class="text-center">Enter your email & password to login</p>

                                @if($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">
                                            {{ $error }}
                                        </div>
                                    @endforeach

                                @endif
                                <div class="form-group">
                                    <label class="col-form-label">Email Address</label>
                                    <input class="form-control" type="email" name="email" required=""
                                           placeholder="Test@gmail.com" value="{{old('email')}}">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control" type="password"
                                               name="password" required="" placeholder="*********">
                                        <div class="show-hide"><span class="show">                         </span></div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="remember" type="checkbox" name="remember" {{old('remember') ? "checked" : ""}}>
                                        <label class="text-muted" for="remember">Remember password</label>
                                    </div>
                                    <a class="link" href="forget-password.html">Forgot password?</a>
                                    <div class="text-end mt-3">
                                        <button class="btn btn-outline-primary btn-block w-100" type="submit">Giriş Yap</button>
                                    </div>
                                </div>
                                <div class="login-social-title">
                                    <h6>Or Sign in with </h6>
                                </div>
                                <div class="form-group">
                                    <ul class="login-social">
                                        <li><a href="https://www.linkedin.com" target="_blank"><i data-feather="linkedin"></i></a>
                                        </li>
                                        <li><a href="https://twitter.com" target="_blank"><i data-feather="twitter"></i></a></li>
                                        <li><a href="https://www.facebook.com" target="_blank"><i data-feather="facebook"></i></a>
                                        </li>
                                        <li><a href="https://www.instagram.com" target="_blank"><i
                                                    data-feather="instagram"></i></a></li>
                                    </ul>
                                </div>
                                <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2" href="sign-up.html">Create Account</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- latest jquery-->
        <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
        <!-- Bootstrap js-->
        <script src="{{asset('assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
        <!-- feather icon js-->
        <script src="{{asset('assets/js/icons/feather-icon/feather.min.js')}}"></script>
        <script src="{{asset('assets/js/icons/feather-icon/feather-icon.js')}}"></script>
        <!-- scrollbar js-->
        <!-- Sidebar jquery-->
        <script src="{{asset('assets/js/config.js')}}"></script>
        <!-- Template js-->
        <script src="{{asset('assets/js/script.js')}}"></script>
        <!-- login js-->

        @yield('customScript')
    </div>
@endsection

@section('customScript')
@endsection
