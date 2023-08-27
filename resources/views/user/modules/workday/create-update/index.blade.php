@extends('user.layouts.master')
@section('title', 'Çalışma Günü Gir')

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
                    <h3 class="box-title">Çalışma Günü Ekle</h3>
                </div>
                <form class="form-horizontal"
                      action="{{isset($workday)? route('user.workday.edit',['id'=>$workday->id]) :route('user.workday.create')}}"
                      method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Personel</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="employee_id">
                                    <option value={{null}}>Personel Seç</option>
                                    @foreach($employees as $item)
                                        <option
                                            value="{{ $item->id}}" {{ isset($workday) && $workday->employee_id == $item->id ? "selected" : "" }}>{{$item->full_name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Başlangıç Tarihi</label>

                            <div class="col-sm-10">
                                <input id="Test" class="form-control" type="datetime-local" name="start_date"
                                       value="{{isset($workday) ? $workday->start_date->format('Y-m-d H:i'):date('Y-m-d 09:00')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Bitiş Tarihi</label>

                            <div class="col-sm-10">
                                <input class="form-control" type="datetime-local" name="end_date"
                                       value="{{isset($workday) ? $workday->end_date->format('Y-m-d H:i'):date('Y-m-d 18:001')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Durum</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="status">
                                    <option value={{null}}>Durum Seç</option>
                                        <option value="0" {{isset($workday) & $workday->status==null ? "selected" : "" }} >Pasif</option>
                                        <option value="1" {{isset($workday) & $workday->status!=null ? "selected" : "" }}>Aktif</option>
                                </select>
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
    @include('user.modules.workday.create-update.components.style')
@endsection

@section('customScript')
    @include('user.modules.workday.create-update.components.script')
@endsection
