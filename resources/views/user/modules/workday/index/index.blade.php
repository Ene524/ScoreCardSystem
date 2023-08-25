@extends('user.layouts.master')
@section('title','Çalışma Günleri')
@section('content')

    <div class="page-body">
        <div class="container-fluid">

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            <div class="row">
                <div class="col-sm-12">
                    <div class="card p-10">
                        <div class="card-header">
                            <h4 style="display:inline-flex;line-height:2">Puantaj Listesi</h4>
                            <a href="{{route('user.workday.create')}}" class="btn btn-primary btn-sm btn-square pull-right">Puantaj Oluştur</a>

                        </div>
                        <div class="table-responsive theme-scrollbar">
                            <table class="table table-responsive">
                                <thead>
                                <tr class="border-bottom-primary">
                                    <th scope="col">#</th>
                                    <th scope="col">Personel</th>
                                    <th scope="col">Tarih</th>
                                    <th scope="col">Başlangıç Saati</th>
                                    <th scope="col">Bitiş Tarihi</th>
                                    <th scope="col">İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($workdays as $workday)
                                    <tr>
                                        <th>{{$workday->id}}</th>
                                        <td>{{$workday->employee->full_name}}</td>
                                        <td>{{$workday->date  }}</td>
                                        <td>{{$workday->start}}</td>
                                        <td>{{$workday->end}}</td>
                                        <td>
                                            <a href="{{route('user.workday.edit',['id'=> $workday->id])}}"
                                               class="btn btn-primary btn-xs editWorkday"
                                               data-id="{{$workday->id}}" data-toggle="tooltip" data-placement="top"
                                               title="Düzenle"><i class="fa fa-edit"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-danger btn-xs deleteWorkday" data-id="{{$workday->id}}"
                                               data-toggle="tooltip" data-placement="top"
                                               title="Sil"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <br>
{{--                             {{$workdays->onEachSide(2)->links()}}--}}
                        </div>
                    </div>
                </div>
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
