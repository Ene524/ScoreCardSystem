@extends('user.layouts.master')
@section('title', 'Personel Oluştur')
@section('header-title', 'Personel Oluştur')
@section('subHeader-title', 'Özet bilgileriniz bu ekranda görünür')
@section('content')

    <div class="row">
        <div class="col-md-12">


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

            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Departman Ekle</h3>
                </div>
                <form class="form-horizontal"
                      action="{{isset($department)? route('user.employee.edit',['id'=>$department->id]) :route('user.employee.create')}}"
                      method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputFullName3" class="col-sm-2 control-label">Adı</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="full_name" placeholder="Ad Soyad"
                                       value="{{isset($department) ? $department->name:""}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputFullName3" class="col-sm-2 control-label">Açıklaması</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="full_name" placeholder="Ad Soyad"
                                       value="{{isset($department) ? $department->description:""}}">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="button" class="btn btn-default pull-right" style="margin-left: 5px">Vazgeç
                            </button>
                            <button type="submit" class="btn btn-info pull-right">Kaydet</button>

                        </div>

                    </div>


                </form>
            </div>
        </div>

    </div>

@endsection

@section('customStyle')
    @include('user.modules.employee.create-update.components.style')
@endsection

@section('customScript')
    @include('user.modules.employee.create-update.components.script')
@endsection
