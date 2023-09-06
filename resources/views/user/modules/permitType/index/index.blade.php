@extends('user.layouts.master')
@section('title', 'İzin Türleri Listesi')
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
                    <h3 class="box-title pull-left">İzin Türleri Listesi</h3>
                    <a href="{{route('user.permitType.create')}}" class="btn btn-primary btn-sm btn-square pull-right">İzin Türü Oluştur</a>
                </div>
                <table class="table table-responsive table-striped">
                    <thead>
                    <tr class="border-bottom-primary">
                        <th scope="col">#</th>
                        <th scope="col">İzin Türü Adı</th>
                        <th scope="col">İzin Türü Açıklaması</th>
                        <th scope="col">İzin Gün Sayısı</th>
                        <th scope="col">Durumu</th>
                        <th scope="col">İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($positions as $permitType)
                        <tr>
                            <th>{{$permitType->id}}</th>
                            <td>{{$permitType->name}}</td>
                            <td>{{$permitType->description}}</td>
                            <td>{{$permitType->day}}</td>
                            @if($permitType->status==1)
                                <td><span class="badge bg-green" name="status">Aktif</span></td>
                            @else
                                <td><span class="badge bg-red" name="status">Pasif</span></td>
                            @endif


                            <td>
                                <a href="{{route('user.permitType.edit',['id'=> $permitType->id])}}"
                                   class="btn btn-primary btn-xs editdeletePermitType"
                                   data-id="{{$permitType->id}}" data-toggle="tooltip" data-placement="top"
                                   title="Düzenle"><i class="fa fa-edit"></i></a>
                                <a href="javascript:void(0)" class="btn btn-danger btn-xs deletePermitType" data-id="{{$permitType->id}}" data-name="{{$permitType->name}}"
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
    @include('user.modules.permitType.index.components.style')
@endsection

@section('customScript')
    @include('user.modules.permitType.index.components.script')
@endsection
