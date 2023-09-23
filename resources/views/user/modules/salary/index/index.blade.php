@extends('user.layouts.master')
@section('title', 'Maaş Listesi')
@section('content')

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif


            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title pull-left">Maaş Listesi</h3>
                    <a href="{{route('user.salary.create')}}" class="btn btn-primary btn-sm btn-square pull-right">Personel
                        Oluştur</a>
                </div>
                <div class="box-body with-border">
                    <table class="table table-responsive table-striped">
                        <thead>
                        <tr class="border-bottom-primary">
                            <th scope="col">#</th>
                            <th scope="col">Maaş Tanımı</th>
                            <th scope="col">Maaş Açıklaması</th>
                            <th scope="col">Maaş Tutarı</th>
                            <th scope="col">Durumu</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($salaries as $salary)
                            <tr>
                                <th>{{$salary->id}}</th>
                                <td>{{$salary->name}}</td>
                                <td>{{$salary->description}}</td>
                                <td>{{$salary->amount}}</td>
                                @if($salary->status==1)
                                    <td><span class="badge bg-green" name="status">Aktif</span></td>
                                @else
                                    <td><span class="badge bg-red" name="status">Pasif</span></td>
                                @endif


                                <td>
                                    <a href="{{route('user.salary.edit',['id'=> $salary->id])}}"
                                       class="btn btn-primary btn-xs editSalary"
                                       data-id="{{$salary->id}}" data-toggle="tooltip" data-placement="top"
                                       title="Düzenle"><i class="fa fa-edit"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-xs deleteSalary"
                                       data-id="{{$salary->id}}" data-name="{{$salary->name}}"
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
    </div>

@endsection

@section('customStyle')
    @include('user.modules.salary.index.components.style')
@endsection

@section('customScript')
    @include('user.modules.salary.index.components.script')
@endsection
