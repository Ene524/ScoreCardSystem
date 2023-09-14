@extends('auth.user.layouts.master')
@section('title', 'Giriş Yap')
@section('customStyle')
@endsection


@section('content')
    <div class="login-box">
        <div class="login-logo">
            <b>Personel</b>Puantaj
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Oturumunuzu başlatmak için giriş yapın</p>

            <form action="{{ route('user.login') }}" method="POST">
                @csrf
                @if ($errors->any())
                    <div class="callout callout-danger">
                        <h5>İşleminiz gerçekleştirilmedi</h5>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password"
                        value="{{ old('password') }}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Beni hatırla
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
@endsection

@section('customScript')
@endsection
