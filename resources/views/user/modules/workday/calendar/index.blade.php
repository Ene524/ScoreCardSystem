@extends('user.layouts.master')
@section('title','Çalışma Günleri')
@section('content')

    <div class="col-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Takvim</h3>
            </div>
            <div class="box-body">
                <div id="calendar">
                </div>
            </div>
        </div>
    </div>


@include('user.modules.workday.calendar.modals.modal_permit_create-update')1

@endsection

@section('customStyle')
    @include('user.modules.workday.calendar.components.style')
@endsection

@section('customScript')
    @include('user.modules.workday.calendar.components.script')
@endsection
