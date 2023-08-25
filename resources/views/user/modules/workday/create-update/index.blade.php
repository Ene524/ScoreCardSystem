@extends('user.layouts.master')
@section('title', 'Çalışma Günü Gir')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">

                @if ($errors->all())
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Dikkat!</h4>
                        <p>İşleminiz gerçekleştirilemedi</p>
                        <hr>
                        @foreach ($errors->all() as $error)
                            <ul>
                                <li><i class="fa fa-angle-double-right txt-white m-r-10"></i>{{ $error }}</li>
                            </ul>
                        @endforeach
                    </div>
                @endif

                <div class="card">
                    <div class="card-header pb-0">
                        <h4>Personel {{isset($employee) ? "Düzenle" : "Ekle"}}</h4>
                    </div>

                    <div class="card-body">
                        <form
                            action="{{isset($employee)? route('user.employee.edit',['id'=>$employee->id]) :route('user.employee.create')}}"
                            method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Personel</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="employee_id">
                                                    <label for="description"></label>
                                                    <option value={{null}}>Personel Seç</option>
                                                    @foreach($employees as $item)
                                                        <option
                                                            value="{{ $item->id }}" {{ isset($workday) && $workday->$employee_id == $item->id ? "selected" : "" }}>{{ $item->full_name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Tarih</label>
                                            <div class="col-sm-10">
                                                <input name="date" class="form-control" type="date"
                                                       value="{{isset($workday) ? $workday->date->format('Y-m-d'):date('Y-m-d')}}"
                                                       data-bs-original-title="" title="">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Başlangıç - Bitiş Saat</label>
                                            <div class="col-sm-5">
                                                <input class="form-control digits" type="time" value="21:45:00"
                                                       data-bs-original-title="" title="" name="start">
                                            </div>
                                            <div class="col-sm-5">
                                                <input class="form-control digits" type="time" value="21:45:00"
                                                       data-bs-original-title="" title="" name="start">
                                            </div>
                                        </div>






                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <div class="col-sm-12">
                                    <button class="btn btn-primary" type="submit" data-bs-original-title=""
                                            title="">Gönder
                                    </button>
                                    <input class="btn btn-light" type="reset" value="İptal" data-bs-original-title=""
                                           title="">
                                </div>
                            </div>
                        </form>
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
