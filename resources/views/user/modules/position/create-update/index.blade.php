@extends('user.layouts.master')
@section('title', 'Pozisyon Oluştur')
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
                    <h3 class="box-title">Pozisyon Ekle</h3>
                </div>
                <form class="form-horizontal"
                      action="{{isset($position)? route('user.position.edit',['id'=>$position->id]) :route('user.position.create')}}"
                      method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputFullName3" class="col-sm-2 control-label">Adı</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="name" placeholder="Pozisyon Adı"
                                       value="{{isset($position) ? $position->name:""}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputFullName3" class="col-sm-2 control-label">Açıklaması</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="description" placeholder="Açıklama"
                                       value="{{isset($position) ? $position->description:""}}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputFullName3" class="col-sm-2 control-label">Açıklaması</label>

                            <div class="col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="status" {{ isset($position) && $position->status  ? "checked" : "" }}>
                                    </label>
                                </div>
                            </div>
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
    @include('user.modules.position.create-update.components.style')
@endsection

@section('customScript')
    @include('user.modules.position.create-update.components.script')
@endsection
