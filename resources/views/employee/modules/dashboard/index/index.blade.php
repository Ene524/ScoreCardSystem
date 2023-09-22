@extends('employee.layouts.master')
@section('title', 'Dashboard')
@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Takvim</h3>

                </div>

                <div class="box-body">
                    <div id="calendar">

                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4">

            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Son aldığım izinler</h3>

                </div>

                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin" id="lastPermits">
                            <thead>
                            <tr class="border-bottom-primary">
                                <th scope="col">Başlangıç Tarihi</th>
                                <th scope="col">Bitiş Tarihi</th>
                                <th scope="col">İzin Türü</th>
                                <th scope="col">Saat</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">


    </div>

@endsection

@section('customStyle')
    @include('employee.modules.dashboard.index.components.style')
@endsection

@section('customScript')
    @include('employee.modules.dashboard.index.components.script')
@endsection
