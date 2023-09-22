@extends('employee.layouts.auth')
@section('title','Giriş Yap')


@section('content')
    <div class="login-box">
        <div class="login-logo">
            <b>Personel</b>Puantaj

        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Personel oturumunuzu başlatmak için giriş yapın</p>

            <div>
                @csrf
                @if($errors->any())
                    <div class="callout callout-danger">
                        <h5>İşleminiz gerçekleştirilmedi</h5>
                        @foreach ($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" id="email" value="{{old('email')}}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" id="password" value="{{old('password')}}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{old('remember') ? "checked" : ""}}> Beni hatırla
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button id="LoginButton" class="btn btn-primary btn-block btn-flat">Giriş Yap</button>
                        </div>


                        <div class="col-xs-12" style="margin-top: 25px">
                            <a href="{{route('home')}}" class="btn btn-default btn-block btn-flat">Ana ekrana dön</a>
                        </div>
                        <!-- /.col -->
                    </div>

                </div>
            </div>
        </div>
        <!-- /.login-box-body -->
    </div>
@endsection


@section('customStyle')
    @include('employee.modules.authentication.login.components.style')
@endsection

@section('customScript')
    @include('employee.modules.authentication.login.components.script')
@endsection
