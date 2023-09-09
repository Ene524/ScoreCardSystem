@extends('user.layouts.master')
@section('title', 'Toplu Çalışan Ekleme')
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

                <form action="{{ route('user.batchTransactions.addEmployee') }}" class="form-horizontal" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">

                        <h4 class="lead">Toplu bir şekilde çalışma günü ekleyin</h4>
                        {{-- <p></p> --}}

                    </div>

                    <div class="form-group">
                        <div class="col-sm-4">
                            <select class="form-control">
                                <option value="0">Seçiniz</option>
                                <option value="0">Seçiniz</option>
                                <option value="0">Seçiniz</option>
                            </select>
                        </div>



                        <div class="col-sm-4">
                            <select class="form-control">
                                <option value="0">Seçiniz</option>
                                <option value="0">Seçiniz</option>
                                <option value="0">Seçiniz</option>
                            </select>
                        </div>
                    </div>


                </form>
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
