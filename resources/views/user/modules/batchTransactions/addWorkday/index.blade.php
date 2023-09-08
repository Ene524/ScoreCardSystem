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
                        <h3 class="box-title">Horizontal Form</h3>
                    </div>


                    <form class="form-horizontal">
                        <div class="box-body">
         
                            <div class="form-group">
                                
                                <div class="col-sm-12">  
                                    <input class="form-control" type="file" id="formFile">
                               
                                </div>
                            </div>
                        </div>

                       

                    </form>
                </div>




            </div>

        </div>
    </div>

@endsection

@section('customStyle')
    @include('user.modules.batchTransactio')
@endsection

@section('customScript')
    @include('user.modules.position.index.components.script')
@endsection
