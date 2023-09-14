@extends('home.layouts.master')
@section('title','Giriş Yap')
@section('customStyle')
@endsection


@section('content')
    <div class="login-box">

        <div class="login-logo" style="margin-bottom: 50px;">
            <b>Personel</b>Puantaj
        </div>

        <div class="col-sm-12">
            <div class="row" style="margin-bottom: 10px;">
                <div class="col-sm-6">
                    <a href="{{route('user.login')}}">
                    <span class="info-box-icon bg-gray-active" style="width: 100%"><i class="ion ion-ios-gear" style="font-size:
                    56px"></i></span>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="{{route('employee.login')}}" >
                    <span class="info-box-icon bg-gray-active" style="width: 100%"><i class="ion ion-ios-person" style="font-size: 56px"></i></span>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                 <div style="width: 100%;text-align: center" >
                     <span style="text-align:center;font-size:18px">Yetkili Ekranı</span>
                 </div>
                </div>
                <div class="col-sm-6">
                    <div style="width: 100%;text-align: center">
                        <span style="text-align:center;font-size:18px">Personel Ekranı</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customScript')
@endsection
