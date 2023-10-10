@extends('user.layouts.master')
@section('title', 'Çalışma Raporu')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">İzin Raporu</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('user.report.permit.download') }}" method="POST">
                        @csrf

                        <div class="col-md-6">
                            <div class="card p-3">
                                <div class="form-group">
                                    <label for="input1">Input 1:</label>
                                    <input type="text" class="form-control" id="input1" placeholder="Değer girin...">
                                </div>
                                <div class="form-group">
                                    <label for="input2">Input 2:</label>
                                    <input type="text" class="form-control" id="input2" placeholder="Değer girin...">
                                </div>
                                <div class="form-group">
                                    <label for="input3">Input 3:</label>
                                    <input type="text" class="form-control" id="input3" placeholder="Değer girin...">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-3">
                                <div class="form-group">
                                    <label for="input4">Input 4:</label>
                                    <input type="text" class="form-control" id="input4" placeholder="Değer girin...">
                                </div>
                                <div class="form-group">
                                    <label for="input5">Input 5:</label>
                                    <input type="text" class="form-control" id="input5" placeholder="Değer girin...">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 button-container">
                            <button class="btn btn-primary btn-block">Buton 1</button>
                            <button class="btn btn-primary btn-block">Buton 2</button>
                            <button class="btn btn-primary btn-block">Buton 3</button>
                            <button class="btn btn-primary btn-block">Buton 4</button>
                            <button class="btn btn-primary btn-block">Buton 5</button>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>

    @include('user.modules.report.permit.modals.modal_workday_report_quick_select')

@endsection

@section('customStyle')
    @include('user.modules.report.permit.components.style')
@endsection

@section('customScript')
    @include('user.modules.report.permit.components.script')
@endsection
