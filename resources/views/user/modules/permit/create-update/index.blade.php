@extends('user.layouts.master')
@section('title', 'İzin Gir')
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
                      action="{{isset($permit)? route('user.permit.edit',['id'=>$permit->id]) :route('user.workday.create')}}"
                      method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Personel</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="employee_id" id="employee_id" style="width: 100%">
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
                                <input  class="form-control" type="datetime-local" name="start_date" id="start_date"
                                        value="{{isset($permit) ? $permit->start_date->format('Y-m-d H:i'):date('Y-m-d 09:00')}}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Bitiş Tarihi</label>

                            <div class="col-sm-10">
                                <input class="form-control" type="datetime-local" name="end_date" id="end_date"
                                       value="{{isset($permit) ? $permit->end_date->format('Y-m-d H:i'):date('Y-m-d 18:00')}}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">İzin Türü</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="permit_type_id" id="permit_type_id" style="width: 100%">
                                    <option value={{null}}>İzin Türü Seç</option>
                                    @foreach($permitTypes as $item)
                                        <option
                                            value="{{ $item->id}}" {{ isset($permit) && $permit->permit_type_id == $item->id ? "selected" : "" }}>{{$item->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Durum</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="status">
                                    <option value={{null}}>Durum Seç</option>
                                    <option value="0" >Pasif</option>
                                    <option value="1" selected >Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Açıklama</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" id="description"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button"
                                    data-bs-original-title=""
                                    title="" onclick="closeForm()">Vazgeç
                            </button>
                            <button class="btn btn-primary" type="button"
                                    data-bs-original-title=""
                                    title="" id="savePermit">Gönder
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>



@endsection

@section('customStyle')
    @include('user.modules.permit.create-update.components.style')
@endsection

@section('customScript')
    @include('user.modules.permit.create-update.components.script')
@endsection
