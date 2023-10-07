@extends('user.layouts.master')
@section('title', 'Çalışma Raporu')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Çalışma Raporu</h3>
                </div>
                <div class="box-body">
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-info"></i> Alert!</h4>
                        Info alert preview. This alert is dismissable.
                        </div>


                </div>
            </div>
        </div>
    </div>

    @include('user.modules.report.totalHour.modals.modal_workday_report_quick_select')

@endsection

@section('customStyle')
    @include('user.modules.report.totalHour.components.style')
@endsection

@section('customScript')
@include('user.modules.report.totalHour.components.script')
@endsection
