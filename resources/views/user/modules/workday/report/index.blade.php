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
                    <form>
                        @csrf
                        <div class="form-group">
                            <div class="col-md-3">
                                <label for="start_date">Başlangıç Tarihi</label>
                                <input type="datetime-local" name="start_date" id="start_date" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label for="end_date">Bitiş Tarihi</label>
                                <input type="datetime-local" name="end_date" id="end_date" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                                <label for="employee_id">Personel</label>
                                <select class="form-control select2" name="employee_id[]" id="employee_ids"
                                    multiple="multiple">
                                    @foreach ($employees as $item)
                                        <option value="{{ $item->id }}"
                                            {{ in_array($item->id, old('employee_id', [])) ? 'selected' : '' }}>
                                            {{ $item->full_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-1">
                                <label for="employee_id"> </label>
                                <button type="button" class="btn btn-primary form-control"
                                    onclick="getWorkHours()">Filtrele</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-1">
                                <label for="employee_id"> </label>
                                <button type="button" class="btn btn-success form-control" id="selectAll">Tümünü
                                    Seç</button>
                            </div>
                        </div>

                        <div class="col-md-12" style="margin-top: 30px">
                            <table class="table table-bordered" id="TotalWorkHours">
                                <thead>
                                    <tr>
                                        <th>Personel</th>
                                        <th>Toplam Çalışma Saati</th>
                                        <th>Toplam İzin Saati</th>
                                        <th>Toplam Net Çalışma Zamanı</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('customStyle')
    @include('user.modules.workday.report.components.style')
@endsection

@section('customScript')
    @include('user.modules.workday.report.components.script')
@endsection
