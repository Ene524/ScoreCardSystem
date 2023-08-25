@extends('user.layouts.master')
@section('title', 'Personel Oluştur')
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
                        <form action="{{isset($employee)? route('user.employee.edit',['id'=>$employee->id]) :route('user.employee.create')}}"
                              method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Ad Soyad</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="full_name"
                                                       value="{{isset($employee) ? $employee->full_name:""}}">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="email" name="email"
                                                       value="{{isset($employee) ? $employee->email:""}}">
                                            </div>
                                        </div>


                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Departman</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="department_id">
                                                    <label for="description"></label>
                                                    <option value={{null}}>Departman Seç</option>
                                                    @foreach($departments as $item)
                                                        <option
                                                            value="{{ $item->id }}" {{ isset($employee) && $employee->department_id == $item->id ? "selected" : "" }}>{{ $item->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Pozisyon</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="position_id">
                                                    <label for="description"></label>
                                                    <option value={{null}}>Pozisyon Seç</option>
                                                    @foreach($positions as $item)
                                                        <option
                                                            value="{{ $item->id }}" {{ isset($employee) && $employee->position_id == $item->id ? "selected" : "" }}>{{ $item->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Maaş</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="salary_id">
                                                    <label for="description"></label>
                                                    <option value={{null}}>Maaş Seç</option>
                                                    @foreach($salaries as $item)
                                                        <option
                                                            value="{{ $item->id }}" {{ isset($employee) && $employee->salary_id == $item->id ? "selected" : "" }}>{{ $item->amount}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">İşe Başlama Tarihi</label>
                                            <div class="col-sm-10">
                                                <input name="employment_date" class="form-control" type="date"
                                                       value="{{isset($employee) ? $employee->employment_date->format('Y-m-d'):date('Y-m-d')}}"
                                                       data-bs-original-title="" title="">
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
