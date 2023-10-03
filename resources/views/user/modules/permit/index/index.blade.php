@extends('user.layouts.master')
@section('title', 'İzin Günleri')
@section('content')

    <div class="row">
        <div class="col-md-12">


            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif


            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title pull-left">İzin Listesi</h3>
                    <a href="{{ route('user.permit.create') }}" class="btn btn-primary btn-sm btn-square pull-right"
                       style="margin-left:5px">İzin
                        Oluştur</a>
                    <a href="{{route('user.permit.export')}}" class="btn btn-success btn-sm pull-right" style="margin-left:5px">Excel İndir</a>
                </div>
                <div class="box-body with-border">
                    <table class="table table-responsive" id>
                        <thead>
                        <tr class="border-bottom-primary">
                            <th scope="col">Adı Soyadı</th>
                            <th scope="col">Başlangıç Tarihi</th>
                            <th scope="col">Bitiş Tarihi</th>
                            <th scope="col">İzin Türü</th>
                            <th scope="col">İzin Durumu</th>
                            <th scope="col">Açıklama</th>
                            <th scope="col">Saat</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        <form>
                            <tr>
                                <td>
                                    <select class="form-control select2" name="employee_id">
                                        <option value="">Personel Seçiniz</option>
                                        @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}"
                                                {{request()->get("employee_id")== $employee->id ?"selected" : "" }}>
                                                {{ $employee->full_name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input class="form-control" type="datetime-local" name="start_date" value="{{request()->get("start_date")}}"></td>
                                <td><input class="form-control" type="datetime-local" name="end_date" value="{{request()->get("end_date")}}"></td>


                                <td><select class="form-control select2" name="permit_type_id">
                                        <option value="">İzin Türü Seçiniz</option>
                                        @foreach ($permitTypes as $permitType)
                                            <option value="{{ $permitType->id }}"
                                                {{request()->get("permit_type_id")== $permitType->id ?"selected" : "" }}>
                                                {{ $permitType->name }}</option>
                                        @endforeach
                                    </select></td>
                                <td><select class="form-control select2" name="permit_status_id">
                                        <option value="">İzin Durumu Seçiniz</option>
                                        @foreach ($permitStatuses as $permitStatuse)
                                            <option value="{{ $permitStatuse->id }}"
                                                {{request()->get("permit_status_id")== $permitStatuse->id ?"selected" : "" }}>
                                                {{ $permitStatuse->name }}</option>
                                        @endforeach
                                    </select></td>
                                <td><input class="form-control" type="text" name="description" value="{{request()->get("description")}}"></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button class="btn btn-primary" type="submit">Filtrele</button>
                                    <button class="btn btn-primary" type="button" id="clearFilter">Temizle</button>
                                </td>
                            </tr>
                        </form>


                        @foreach ($permits as $permit)
                            <tr>
                                <td>{{ $permit->employee->full_name }}</td>
                                <td>{{ $permit->start_date }}</td>
                                <td>{{ $permit->end_date }}</td>
                                <td>{{ $permit->permitType->name }}</td>
                                <td>{{ $permit->permitStatus->name}}</td>
                                <td>{{ $permit->description }}</td>
                                <td>{{ $permit->permitsTime }} Saat</td>
                                <td>
                                    <a href="{{ route('user.permit.edit', ['id' => $permit->id]) }}"
                                       class="btn btn-primary btn-xs editPermit" data-id="{{ $permit->id }}"
                                       data-toggle="tooltip" data-placement="top" title="Düzenle"><i
                                            class="fa fa-edit"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-xs deletePermit"
                                       data-id="{{ $permit->id }}" data-startdate="{{ $permit->start_date }}"
                                       data-enddate="{{ $permit->end_date }}" data-name="{{ $permit->full_name }}"
                                       data-toggle="tooltip" data-placement="top" title="Sil"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <span class="pull-right">{{$permits->appends($_GET)->onEachSide(2)->links()}}</span>
                </div>
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
