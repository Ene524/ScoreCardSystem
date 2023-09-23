@extends('user.layouts.master')
@section('title','Çalışma Günleri Takvimi')
@section('content')

    <div class="col-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Çalışma Takvimi</h3>
            </div>
            <div class="box-body">
                <div id="calendar">
                </div>
            </div>
        </div>
    </div>


@include('user.modules.workday.calendar.modals.modal_workday_create-update')

@endsection

@section('customStyle')
    @include('user.modules.workday.calendar.components.style')
@endsection

@section('customScript')
    @include('user.modules.workday.calendar.components.script')
@endsection
