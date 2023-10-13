@extends('user.layouts.master')
@section('title', 'Çalışma Raporu')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Çalışma Raporu</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('user.report.workday.download') }}" method="POST">
                        @csrf
                        <div class="col-md-12">

                            <div class="col-md-9">
                                <label for="employee_id">Personel</label>
                                <select class="form-control select2" name="employee_id[]" id="employee_ids"
                                    multiple="multiple" style="width:100%">
                                    @foreach ($employees as $item)
                                        <option value="{{ $item->id }}"
                                            {{ in_array($item->id, old('employee_id', [])) ? 'selected' : '' }}>
                                            {{ $item->full_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="employee_id">Çalışma Tipi</label>
                                <select class="form-control select2" name="workday_type_id" id="workday_type_id"
                                    style="width:100%">
                                    @foreach ($workdayTypes as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="col-md-12" style="margin-top: 25px">
                            <div class="col-md-3">
                                <label for="start_date">Başlangıç Tarihi</label>
                                <input type="datetime-local" name="start_date" id="start_date" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="end_date">Bitiş Tarihi</label>
                                <input type="datetime-local" name="end_date" id="end_date" class="form-control">
                            </div>
                            <div class="col-md-6">

                                <div class="col-md-3" style="padding:0px 2px 0px 2px">
                                    <label></label>
                                    <button type="button" class="btn btn-success form-control" id="selectAll">Tümünü
                                        Seç</button>
                                </div>

                                <div class="col-md-3" style="padding:0px 2px 0px 2px">
                                    <label></label>
                                    <button type="button" class="btn btn-warning form-control" id="quickSelect">Hızlı
                                        Seç</button>
                                </div>

                                <div class="col-md-3" style="padding:0px 2px 0px 2px">
                                    <label></label>
                                    <button type="button" class="btn btn-danger form-control"
                                        id="clearFilter">Temizle</button>
                                </div>

                                <div class="col-md-3" style="padding:0px 2px 0px 2px">
                                    <label></label>
                                    <button class="btn btn-info form-control" type="submit" id="downloadExcel">Excel
                                        İndir</button>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    @include('user.modules.report.workday.modals.modal_workday_report_quick_select')

@endsection

@section('customStyle')
    @include('user.modules.report.workday.components.style')
@endsection

@section('customScript')
    @include('user.modules.report.workday.components.script')
@endsection
