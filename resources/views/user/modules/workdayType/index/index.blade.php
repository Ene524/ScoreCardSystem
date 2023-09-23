@extends('user.layouts.master')
@section('title', 'Mesai Tanımı Listesi')
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
                    <h3 class="box-title pull-left">Mesai Tanımı Listesi</h3>
                    <a href="{{route('user.workdayType.create')}}" class="btn btn-primary btn-sm btn-square pull-right">Mesai
                        Tanımı Oluştur</a>
                </div>
                <div class="box-body with-border">
                    <table class="table table-responsive table-striped">
                        <thead>
                        <tr class="border-bottom-primary">
                            <th scope="col">#</th>
                            <th scope="col">Mesai Tanımı Adı</th>
                            <th scope="col">Mesai Tanımı Açıklaması</th>
                            <th scope="col">Saatlik</th>
                            <th scope="col">Durumu</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($workdayTypes as $workdayType)
                            <tr>
                                <th>{{$workdayType->id}}</th>
                                <td>{{$workdayType->name}}</td>
                                <td>{{$workdayType->description}}</td>
                                <td>{{$workdayType->hourly_wage}}</td>
                                @if($workdayType->status==1)
                                    <td><span class="badge bg-green" name="status">Aktif</span></td>
                                @else
                                    <td><span class="badge bg-red" name="status">Pasif</span></td>
                                @endif


                                <td>
                                    <a href="{{route('user.workdayType.edit',['id'=> $workdayType->id])}}"
                                       class="btn btn-primary btn-xs editWorkdayType"
                                       data-id="{{$workdayType->id}}" data-toggle="tooltip" data-placement="top"
                                       title="Düzenle"><i class="fa fa-edit"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-xs deleteWorkdayType"
                                       data-id="{{$workdayType->id}}" data-name="{{$workdayType->name}}"
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
    @include('user.modules.workdayType.index.components.style')
@endsection

@section('customScript')
    @include('user.modules.workdayType.index.components.script')
@endsection
