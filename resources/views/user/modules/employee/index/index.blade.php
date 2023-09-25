@extends('user.layouts.master')
@section('title', 'Personel Listesi')
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
                    <h3 class="box-title pull-left">Personel Listesi</h3>
                    <a href="{{route('user.employee.create')}}" class="btn btn-primary btn-sm pull-right"
                       style="margin-left:5px">Personel Oluştur</a>
                    <a href="{{route('user.employee.export')}}" class="btn btn-success btn-sm pull-right"
                       style="margin-left:5px">Excel İndir</a>
                </div>
                <div class="box-body with-border">
                    <table class="table table-responsive table-striped" id="employeeTable">
                        <thead>
                        <tr class="border-bottom-primary">
                            <th scope="col">Adı Soyadı</th>
                            <th scope="col">Email</th>
                            <th scope="col">Departman</th>
                            <th scope="col">Pozisyon</th>
                            <th scope="col">Maaş</th>
                            <th scope="col">İşe Giriş Tarihi</th>

                        </tr>
                        </thead>
                        <tbody>
                        <form>
                            <tr>
                                <td><input class="form-control no-margin" placeholder="Ad Soyad" name="full_name" value="{{request()->get("full_name")}}"></td>
                                <td><input class="form-control no-margin" placeholder="Email" name="email" value="{{request()->get("email")}}"></td>
                                <td>
                                    <select class="form-control" name="department_id">
                                        <option value="">Departman Seçiniz</option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}" {{request()->get("department_id")== $department->id ?"selected" : "" }}>{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><select class="form-control no-margin" name="position_id">
                                        <option value="">Pozisyon Seçiniz</option>
                                        @foreach($positions as $position)
                                            <option value="{{$position->id}}" {{request()->get("position_id")== $position->id ?"selected" : "" }}>{{$position->name}}</option>
                                        @endforeach
                                    </select></td>
                                <td><select class="form-control" name="salary_id">
                                        <option value="">Maaş Seçiniz</option>
                                        @foreach($salaries as $salary)
                                            <option value="{{$salary->id}}" {{request()->get("salary_id")== $salary->id ?"selected" : "" }}>{{$salary->amount}}</option>
                                        @endforeach
                                    </select></td>
                                <td></td>
                                <td>
                                    <button class="btn btn-primary" type="submit">Filtrele</button>
                                    <button class="btn btn-primary" type="submit">Temizle</button>
                                </td>
                            </tr>
                        </form>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{$employee->full_name}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->department->name}}</td>
                                <td>{{$employee->position->name}}</td>
                                <td>{{$employee->salary->amount}}</td>
                                <td>{{$employee->employment_date->format('d.m.Y')}}</td>
                                <td>
                                    <a href="{{route('user.employee.edit',['id'=> $employee->id])}}"
                                       class="btn btn-primary btn-xs editEmployee"
                                       data-id="{{$employee->id}}" data-toggle="tooltip" data-placement="top"
                                       title="Düzenle"><i class="fa fa-edit"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-xs deleteEmployee"
                                       data-id="{{$employee->id}}" data-name="{{$employee->full_name}}"
                                       data-toggle="tooltip" data-placement="top"
                                       title="Sil"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <span class="pull-right">{{$employees->appends($_GET)->onEachSide(2)->links()}}</span>
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
