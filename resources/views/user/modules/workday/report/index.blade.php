@extends('user.layouts.master')
@section('title','Çalışma Günleri')
@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Çalışma Raporu</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">

                        <table>
                            <thead>
                                <tr>
                                    <th>Personel</th>
                                    <th>Çalışma Saati</th>
                                </tr>
                            </thead>

                            <tbody>
                           @foreach($reports as $item)
                                <tr>
                                    <td>{{$item->user_id}}</td>
                                    <td>{{$item->total_working_hours}}</td>
                                </tr>
                           @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection

@section('customStyle')
    @include('user.modules.workday.report.components.style')
@endsection

@section('customScript')
    @include('user.modules.workday.report.components.script')
@endsection
