@extends('employee.layouts.master')
@section('title', 'Dashboard')
@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Latest Orders</h3>

                </div>

                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Item</th>
                                <th>Status</th>
                                <th>Popularity</th>
                            </tr>
                            </thead>
                            <tbody>

                        </table>
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
                        <table class="table no-margin">
                            <thead>
                            <tr class="border-bottom-primary">
                                <th scope="col">Başlangıç Tarihi</th>
                                <th scope="col">Bitiş Tarihi</th>
                                <th scope="col">İzin Türü</th>
                                <th scope="col">Saat</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($lastPermits as $item)
                                <tr>
                                    <td>{{$item->start_date}}</td>
                                    <td>{{$item->end_date}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->permitsTime}} Saat
                                    </td>

                                </tr>
                            @endforeach
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
