@extends('user.layouts.master')
@section('title', 'Personel Listesi')
@section('content')
    @section('header-title', 'Personel Listesi')
    @section('subHeader-title', 'Personel listesini buradan görürsünüz')

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif


            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title pull-left">Personel Listesi</h3>
                    <a href="{{route('user.employee.create')}}" class="btn btn-primary btn-sm btn-square pull-right">Personel Oluştur</a>
                </div>
                <table class="table table-responsive table-striped">
                    <thead>
                    <tr class="border-bottom-primary">
                        <th scope="col">#</th>
                        <th scope="col">Adı Soyadı</th>
                        <th scope="col">Email</th>
                        <th scope="col">Departman</th>
                        <th scope="col">Pozisyon</th>
                        <th scope="col">Maaş</th>
                        <th scope="col">İşe Giriş Tarihi</th>
                        <th scope="col">İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <th>{{$employee->id}}</th>
                            <td>{{$employee->full_name}}</td>
                            <td>{{$employee->email}}</td>
                            <td>{{$employee->department->name}}</td>
                            <td>{{$employee->position->name}}</td>
                            <td>{{$employee->salary->amount}}</td>
                            <td>{{$employee->employment_date->format('d.m.Y')}}</td>
                            <td>
                                <a href="{{route('user.employee.edit',['id'=> $employee->id])}}"
                                   class="btn btn-primary btn-xs editEmployee"
                                   data-id="{{$employee->id}}" data-toggle="tooltip" data-placement="top"
                                   title="Düzenle"><i class="fa fa-edit"></i></a>
                                <a href="javascript:void(0)" class="btn btn-danger btn-xs deleteEmployee" data-id="{{$employee->id}}" data-name="{{$employee->full_name}}"
                                   data-toggle="tooltip" data-placement="top"
                                   title="Sil"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>

@endsection

@section('customStyle')
    @include('user.modules.employee.index.components.style')
@endsection

@section('customScript')
    @include('user.modules.employee.index.components.script')
@endsection
