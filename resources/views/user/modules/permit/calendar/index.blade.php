@extends('user.layouts.master')
@section('title','İzin Günleri Takvimi')
@section('content')

    <div class="col-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">İzin Takvimi</h3>
            </div>
            <div class="box-body">
                <div id="calendar">
                </div>
            </div>
        </div>
    </div>


@include('user.modules.permit.calendar.modals.modal_permit_create-update')

@endsection

@section('customStyle')
    @include('user.modules.permit.calendar.components.style')
@endsection

@section('customScript')
    @include('user.modules.permit.calendar.components.script')
@endsection
