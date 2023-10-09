@extends('user.layouts.master')
@section('title', 'Çalışma Raporu')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Personel Raporu</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('user.report.employee.download') }}" method="POST">
                        @csrf
                        <div class="col-md-6">
                            Personel Raporunu excel olarak indirebilirsiniz
                        </div>
                        <div class="col-md-6">

                            <button class="btn btn-success pull-right">Excel
                                İndir</button>
                    </form>
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
