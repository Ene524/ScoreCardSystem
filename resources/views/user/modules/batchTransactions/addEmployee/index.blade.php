@extends('user.layouts.master')
@section('title', 'Toplu Personel Ekleme')
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
                    <h3 class="box-title">Toplu Firma Ekle</h3>
                </div>
                <div class="box-body with-border">
                    <form action="{{ route('user.batchTransactions.addEmployee') }}" class="form-horizontal" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">

                            <h4 class="lead">Excel ile personellerinizi aktarın</h4>
                            <a href="{{ route('user.batchTransactions.downloadEmployeeTemplate') }}"
                                class="btn btn-primary btn-sm pull-right">Excel Şablonu İndir</a>
                            <p>Yükleyeceğinizin excel şablon standartlarına göre uygun olmalı ve uzantısı .xlsx olmalıdır
                            </p>

                        </div>

                        <div class="form-group">
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="excelFile" accept=".xlsx">
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-success btn-block" type="submit">Aktar</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>


        </div>
    </div>

@endsection

@section('customStyle')
    @include('user.modules.batchTransactions.addEmployee.components.style')
@endsection

@section('customScript')
    @include('user.modules.batchTransactions.addEmployee.components.style')
@endsection
