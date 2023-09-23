@extends('user.layouts.master')
@section('title', 'İzin Durumları Listesi')
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
                    <h3 class="box-title pull-left">İzin Durumları Listesi</h3>
                    <a href="{{route('user.permitStatus.create')}}" class="btn btn-primary btn-sm btn-square pull-right">İzin Durumu Oluştur</a>
                </div>
                <div class="box-body with-border">
                    <table class="table table-responsive table-striped">
                        <thead>
                        <tr class="border-bottom-primary">
                            <th scope="col">#</th>
                            <th scope="col">İzin Durum Tanımı</th>
                            <th scope="col">İzin Durum Açıklaması</th>
                            <th scope="col">Durumu</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($positions as $permitStatus)
                            <tr>
                                <th>{{$permitStatus->id}}</th>
                                <td>{{$permitStatus->name}}</td>
                                <td>{{$permitStatus->description}}</td>
                                @if($permitStatus->status==1)
                                    <td><span class="badge bg-green" name="status">Aktif</span></td>
                                @else
                                    <td><span class="badge bg-red" name="status">Pasif</span></td>
                                @endif


                                <td>
                                    <a href="{{route('user.permitStatus.edit',['id'=> $permitStatus->id])}}"
                                       class="btn btn-primary btn-xs editPermitStatus"
                                       data-id="{{$permitStatus->id}}" data-toggle="tooltip" data-placement="top"
                                       title="Düzenle"><i class="fa fa-edit"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-xs deletePermitStatus" data-id="{{$permitStatus->id}}" data-name="{{$permitStatus->name}}"
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
    @include('user.modules.permitStatus.index.components.style')
@endsection

@section('customScript')
    @include('user.modules.permitStatus.index.components.script')
@endsection
