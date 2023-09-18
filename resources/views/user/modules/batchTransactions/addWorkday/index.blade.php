@extends('user.layouts.master')
@section('title', 'Toplu Çalışma Günü Ekleme')
@section('content')

    <div class="row">
        <div class="col-md-12">

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Başarılı</h4>
                    {{ session()->get('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="callout callout-danger">
                    <h5>İşleminiz gerçekleştirilmedi</h5>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div class="box box-info" style="padding: 15px">
                <div class="box-header with-border">
                    <h3 class="box-title">Toplu Çalışma Günü Ekle</h3>
                </div>

                <form action="{{ route('user.batchTransactions.addWorkday') }}" class="form-horizontal" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">

                        <h4 class="lead">Toplu bir şekilde çalışma günü ekleyin</h4>
                        {{-- <p></p> --}}

                    </div>

                    <div class="form-group">

                        <div class="col-sm-10">
                            <label>Personel Seçimi</label>
                            <select class="form-control select2" name="employee_id[]" id="employee_ids"
                                    multiple="multiple">
                                @foreach($employees as $item)
                                    <option
                                        value="{{ $item->id }}" {{ in_array($item->id, old('employee_id', [])) ? "selected" : "" }}>
                                        {{ $item->full_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2" style="line-height:26px">
                            <label> </label>
                            <button type="button" class="btn btn-primary btn-block" id="selectAll">Tümünü Seç</button>
                        </div>


                    </div>



                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="control-label">Başlangıç Tarihi</label>
                            <input onfocus="this.showPicker()" class="form-control" type="datetime-local" name="start_date"
                                   value="{{ isset($workday) ? $workday->start_date->format('Y-m-d H:i') : \Carbon\Carbon::now()->firstOfMonth()->format('Y-m-d 09:00')}}">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="control-label">Bitiş Tarihi</label>


                            <input onfocus="this.showPicker()" class="form-control" type="datetime-local" name="end_date"
                                   value="{{ isset($workday) ? $workday->end_date->format('Y-m-d H:i') : \Carbon\Carbon::now()->lastOfMonth()->format('Y-m-d 18:00')}}">

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                           <button type="submit" class="btn btn-success">Çalışma Günü Oluştur</button>
                    </div>


                </form>
            </div>

        </div>
    </div>

@endsection

@section('customStyle')
    @include('user.modules.batchTransactions.addWorkday.components.style')
@endsection

@section('customScript')
    @include('user.modules.batchTransactions.addWorkday.components.script')
@endsection
