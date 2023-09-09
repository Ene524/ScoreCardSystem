@extends('user.layouts.master')
@section('title', 'Departman Listesi')
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
                    <h3 class="box-title pull-left">Departman Listesi</h3>
                    <a href="{{route('user.department.create')}}" class="btn btn-primary btn-sm btn-square pull-right">Departman Oluştur</a>
                </div>
                <table class="table table-responsive table-striped">
                    <thead>
                    <tr class="border-bottom-primary">
                        <th scope="col">#</th>
                        <th scope="col">Departman Adı</th>
                        <th scope="col">Departman Açıklaması</th>
                        <th scope="col">Durumu</th>
                        <th scope="col">İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($departments as $department)
                        <tr>
                            <th>{{$department->id}}</th>
                            <td>{{$department->name}}</td>
                            <td>{{$department->description}}</td>
                            @if($department->status==1)
                                <td><span class="badge bg-green" name="status">Aktif</span></td>
                            @else
                                <td><span class="badge bg-red" name="status">Pasif</span></td>
                            @endif


                            <td>
                                <a href="{{route('user.department.edit',['id'=> $department->id])}}"
                                   class="btn btn-primary btn-xs editDepartment"
                                   data-id="{{$department->id}}" data-toggle="tooltip" data-placement="top"
                                   title="Düzenle"><i class="fa fa-edit"></i></a>
                                <a href="javascript:void(0)" class="btn btn-danger btn-xs deleteDepartment" data-id="{{$department->id}}" data-name="{{$department->name}}"
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
    @include('user.modules.department.index.components.style')
@endsection

@section('customScript')
    @include('user.modules.department.index.components.script')
@endsection
