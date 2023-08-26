@extends('user.layouts.master')
@section('title', 'Dashboard')
@section('header-title', 'Anasayfa')
@section('subHeader-title', 'Özet bilgileriniz bu ekranda görünür')
@section('content')

    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{$employeeCount}}</h3>
                    <p>Personel</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{route('user.employee.index')}}" class="small-box-footer">
                    Detay <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

@endsection

@section('customStyle')
    @include('user.modules.dashboard.index.components.style')
@endsection

@section('customScript')
    @include('user.modules.dashboard.index.components.script')
@endsection
