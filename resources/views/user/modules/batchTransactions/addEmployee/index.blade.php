@extends('user.layouts.master')
@section('title', 'Toplu Personel Ekleme')
@section('content')

    <div class="row">
        <div class="col-md-12">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            <div class="col-md-12">

                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Toplu Firma Ekle</h3>
                    </div>


                    <form action="{{ route('user.batchTransactions.addEmployee') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">

                            <div class="callout callout-warning">
                                <h4 class="lead">Excel ile personellerinizi aktarın</h4>
                                <p>Yükleyeceğinizin excel şablon standartlarına göre uygun olmalı ve uzantısı .xlsx olmalıdır</p>
                                </div>
    
                            <div class="form-group">                            
                                <div class="col-sm-12">  
                                    <input class="form-control" type="file" name="excelFile" accept=".xlsx, .xls">
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-success" type="submit">Gönder</button>

                       

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
