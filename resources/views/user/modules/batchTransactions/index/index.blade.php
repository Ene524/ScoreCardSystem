@extends('user.layouts.master')
@section('title', 'Toplu Personel Ekleme')
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
                    <h3 class="box-title pull-left">Pozisyon Listesi</h3>
                    <a href="{{route('user.position.create')}}" class="btn btn-primary btn-sm btn-square pull-right">Personel
                        Oluştur</a>
                </div>
                <table class="table table-responsive table-striped">
                    <thead>
                    <tr class="border-bottom-primary">
                        <th scope="col">#</th>
                        <th scope="col">Pozisyon Adı</th>
                        <th scope="col">Pozisyon Açıklaması</th>
                        <th scope="col">Durumu</th>
                        <th scope="col">İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($positions as $position)
                        <tr>
                            <th>{{$position->id}}</th>
                            <td>{{$position->name}}</td>
                            <td>{{$position->description}}</td>
                            @if($position->status==1)
                                <td><span class="badge bg-green" name="status">Aktif</span></td>
                            @else
                                <td><span class="badge bg-red" name="status">Pasif</span></td>
                            @endif


                            <td>
                                <a href="{{route('user.position.edit',['id'=> $position->id])}}"
                                   class="btn btn-primary btn-xs editPosition"
                                   data-id="{{$position->id}}" data-toggle="tooltip" data-placement="top"
                                   title="Düzenle"><i class="fa fa-edit"></i></a>
                                <a href="javascript:void(0)" class="btn btn-danger btn-xs deletePosition"
                                   data-id="{{$position->id}}" data-name="{{$position->name}}"
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
    @include('user.modules.position.index.components.style')
@endsection

@section('customScript')
    @include('user.modules.position.index.components.script')
@endsection
