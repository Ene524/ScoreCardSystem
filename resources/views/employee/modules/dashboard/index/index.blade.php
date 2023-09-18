@extends('employee.layouts.master')
@section('title', 'Dashboard')
@section('content')

    <div class="row">
        <div class="col-md-7">
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
                            <tr>
                                <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                <td>Call of Duty IV</td>
                                <td><span class="label label-success">Shipped</span></td>
                                <td>
                                    <div class="sparkbar" data-color="#00a65a" data-height="20">
                                        <canvas width="34" height="20"
                                                style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                <td>Call of Duty IV</td>
                                <td><span class="label label-success">Shipped</span></td>
                                <td>
                                    <div class="sparkbar" data-color="#00a65a" data-height="20">
                                        <canvas width="34" height="20"
                                                style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                <td>Call of Duty IV</td>
                                <td><span class="label label-success">Shipped</span></td>
                                <td>
                                    <div class="sparkbar" data-color="#00a65a" data-height="20">
                                        <canvas width="34" height="20"
                                                style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                <td>Call of Duty IV</td>
                                <td><span class="label label-success">Shipped</span></td>
                                <td>
                                    <div class="sparkbar" data-color="#00a65a" data-height="20">
                                        <canvas width="34" height="20"
                                                style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                <td>Call of Duty IV</td>
                                <td><span class="label label-success">Shipped</span></td>
                                <td>
                                    <div class="sparkbar" data-color="#00a65a" data-height="20">
                                        <canvas width="34" height="20"
                                                style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                <td>Call of Duty IV</td>
                                <td><span class="label label-success">Shipped</span></td>
                                <td>
                                    <div class="sparkbar" data-color="#00a65a" data-height="20">
                                        <canvas width="34" height="20"
                                                style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                <td>Call of Duty IV</td>
                                <td><span class="label label-success">Shipped</span></td>
                                <td>
                                    <div class="sparkbar" data-color="#00a65a" data-height="20">
                                        <canvas width="34" height="20"
                                                style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                <td>Call of Duty IV</td>
                                <td><span class="label label-success">Shipped</span></td>
                                <td>
                                    <div class="sparkbar" data-color="#00a65a" data-height="20">
                                        <canvas width="34" height="20"
                                                style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas>
                                    </div>
                                </td>
                            </tr>


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Son İzinlerim</h3>

                </div>

                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                            <tr class="border-bottom-primary">
                                <th scope="col">Adı Soyadı</th>
                                <th scope="col">Başlangıç Tarihi</th>
                                <th scope="col">Bitiş Tarihi</th>
                                <th scope="col">İzin Türü</th>
                                <th scope="col">Saat</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($lastPermits as $item)
                                <tr>
                                    <td>{{$item->employee->full_name}}</td>
                                    <td>{{$item->start_date->format('d.m.Y H:i')}}</td>
                                    <td>{{$item->end_date->format('d.m.Y H:i')}}</td>
                                    <td>{{$item->permitType->name}}</td>
                                    <td>{{round((strtotime($item->end_date) - strtotime($item->start_date)) / 3600)}}
                                        Saat
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Bekleyen Onaylar</h3>

                </div>

                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                            <tr class="border-bottom-primary">
                                <th scope="col">Adı Soyadı</th>
                                <th scope="col">Başlangıç Tarihi</th>
                                <th scope="col">Bitiş Tarihi</th>
                                <th scope="col">İzin Türü</th>
                                <th scope="col">Saat</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($lastPermits as $item)
                                <tr>
                                    <td>{{$item->employee->full_name}}</td>
                                    <td>{{$item->start_date->format('d.m.Y H:i')}}</td>
                                    <td>{{$item->end_date->format('d.m.Y H:i')}}</td>
                                    <td>{{$item->permitType->name}}</td>
                                    <td>{{round((strtotime($item->end_date) - strtotime($item->start_date)) / 3600)}}
                                        Saat
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
