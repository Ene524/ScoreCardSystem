@extends('user.layouts.master')
@section('title', 'Çalışma Günleri')
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
                    <h3 class="box-title pull-left">Çalışma Günü Listesi</h3>
                    <a href="{{ route('user.workday.create') }}" class="btn btn-primary btn-sm btn-square pull-right"  style="margin-left:5px">Çalışma
                        Günü Oluştur</a>
                    <a href="{{route('user.workday.export')}}" class="btn btn-success btn-sm pull-right" style="margin-left:5px">Excel İndir</a>
                </div>
                <div class="box-header with-border">
                    <table class="table table-responsive" id="workdayTable">
                        <thead>
                            <tr class="border-bottom-primary">
                                <th scope="col">Adı Soyadı</th>
                                <th scope="col">Başlangıç Tarihi</th>
                                <th scope="col">Bitiş Tarihi</th>
                                <th scope="col">Mesai Türü</th>
                                <th scope="col">Saat</th>
                                <th scope="col">Statü</th>
                                <th scope="col">İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form>
                                <tr>
                                    <td>
                                        <select class="form-control" name="employee_id">
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


                                    <td> <select class="form-control" name="workday_type_id">
                                            <option value="">Mesai Seçiniz</option>
                                            @foreach ($workdayTypes as $workdayType)
                                                <option value="{{ $workdayType->id }}"
                                                    {{request()->get("workday_type_id")== $workdayType->id ?"selected" : "" }}>
                                                    {{ $workdayType->name }}</option>
                                            @endforeach
                                        </select></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button class="btn btn-primary" type="submit">Filtrele</button>
                                        <button class="btn btn-primary" type="button" id="clearFilter">Temizle</button>
                                    </td>
                                </tr>
                            </form>
                            @foreach ($workdays as $workday)
                                <tr>
                                    <td>{{ $workday->employee->full_name }}</td>
                                    <td>{{ $workday->start_date }}</td>
                                    <td>{{ $workday->end_date }}</td>
                                    <td>{{ $workday->workdayType->name }}</td>
                                    <td>{{ round((strtotime($workday->end_date) - strtotime($workday->start_date)) / 3600) }}
                                        Saat</td>
                                    <td>{{ $workday->status == null ? 'Pasif ' : 'Aktif' }}</td>
                                    <td>
                                        <a href="{{ route('user.workday.edit', ['id' => $workday->id]) }}"
                                            class="btn btn-primary btn-xs editWorkday" data-id="{{ $workday->id }}"
                                            data-toggle="tooltip" data-placement="top" title="Düzenle"><i
                                                class="fa fa-edit"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-xs deleteWorkday"
                                            data-id="{{ $workday->id }}" data-startdate="{{ $workday->start_date }}"
                                            data-enddate="{{ $workday->end_date }}"
                                            data-name="{{ $workday->employee->full_name }}" data-toggle="tooltip"
                                            data-placement="top" title="Sil"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                     <span class="pull-right">{{$workdays->appends($_GET)->onEachSide(2)->links()}}</span>
                </div>

            </div>
        </div>

    </div>

@endsection

@section('customStyle')
    @include('user.modules.workday.index.components.style')
@endsection

@section('customScript')
    @include('user.modules.workday.index.components.script')
@endsection
