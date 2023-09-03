@extends('user.layouts.master')
@section('title','İzin Günleri')
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
                    <h3 class="box-title pull-left">İzin Listesi</h3>
                    <a href="{{route('user.permit.create')}}" class="btn btn-primary btn-sm btn-square pull-right">İzin Oluştur</a>
                </div>
                <table class="table table-responsive">
                    <thead>
                    <tr class="border-bottom-primary">
                        <th scope="col">#</th>
                        <th scope="col">Adı Soyadı</th>
                        <th scope="col">Başlangıç Tarihi</th>
                        <th scope="col">Bitiş Tarihi</th>
                        <th scope="col">İzin Türü</th>
                        <th scope="col">Saat</th>
                        <th scope="col">Açıklama</th>
                        <th scope="col">Statü</th>
                        <th scope="col">İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>



                      @foreach($permits as $permit)
                        <tr>
                            <td>{{$permit->id}}</td>
                            <td>{{$permit->employee->full_name}}</td>
                            <td>{{$permit->start_date->format('d.m.Y H:i')}}</td>
                            <td>{{$permit->end_date->format('d.m.Y H:i')}}</td>
                            <td>{{$permit->permitType->name}}</td>
                            <td>{{ $hoursDifferences[$permit->id]}}Saat</td>
{{--                            <td>{{round((strtotime($permit->end_date) - strtotime($permit->start_date)) / 3600)}}Saat</td>--}}
                            <td>{{$permit->description}}</td>

                            <td>{{$permit->status==null? "Pasif ": "Aktif"}}</td>
                            <td>
                                <a href="{{route('user.permit.edit',['id'=> $permit->id])}}"
                                   class="btn btn-primary btn-xs editPermit"
                                   data-id="{{$permit->id}}" data-toggle="tooltip" data-placement="top"
                                   title="Düzenle"><i class="fa fa-edit"></i></a>
                                <a href="javascript:void(0)" class="btn btn-danger btn-xs deletePermit"
                                   data-id="{{$permit->id}}" data-startdate="{{$permit->start_date}}"
                                   data-enddate="{{$permit->end_date}}" data-name="{{$permit->employee->full_name}}"
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
    @include('user.modules.permit.index.components.style')
@endsection

@section('customScript')
    @include('user.modules.permit.index.components.script')
@endsection
