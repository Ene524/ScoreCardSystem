@extends('user.layouts.master')
@section('title','Çalışma Günleri')
@section('content')

    <div class="page-body">
        <div class="container-fluid">

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="customizer-contain" style="width: 500px">
        <div class="tab-content" id="c-pills-tabContent">
            <div class="customizer-header"><i onclick="closeForm()" class="icofont-close icon-close"></i> <h5>İzin
                    Girişi</h5>

            </div>
            <div class="customizer-body custom-scrollbar">


                <div class="card-body">
                    <div class="row">
                        <div class="col">

                            <form>
                                @csrf
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Personel</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="employee_id">
                                            <label for="description"></label>
                                            <option value={{null}}>Personel Seç</option>
                                            @foreach($employees as $item)
                                                <option
                                                    value="{{ $item->id }}">{{ $item->full_name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Başlangıç</label>
                                    <div class="col-sm-9">
                                        <input class="form-control digits" type="datetime-local" value=""
                                               data-bs-original-title="" title="" id="start">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Bitiş</label>
                                    <div class="col-sm-9">
                                        <input class="form-control digits" type="datetime-local" value=""
                                               data-bs-original-title="" title="" id="end">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">İzin Türü</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="type" id="permit_type_id">
                                            <label for="description"></label>
                                            <option value={{null}}>İzin Türü Seç</option>
                                            @foreach($permitTypes as $item)
                                                <option
                                                    value="{{ $item->id }}"> {{ $item->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Açıklama</label>
                                    <div class="col-sm-9">
                                       <textarea class="form-control" id="description"></textarea>
                                    </div>
                                </div>

                                <div class="mb-3 row">

                                    <div class="card-footer text-end" style="background-color:
                                                white">
                                        <div class="col-sm-12">
                                            <button class="btn btn-primary" type="button"
                                                    data-bs-original-title=""
                                                    title="" id="savePermit">Gönder
                                            </button>
                                            <input class="btn btn-light" type="reset" value="İptal"
                                                   data-bs-original-title=""
                                                   title="" onclick="closeForm()">
                                        </div>
                                    </div>
                                </div>


                            </form>


                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>

@endsection

@section('customStyle')
    @include('user.modules.workday.calendar.components.style')
@endsection

@section('customScript')
    @include('user.modules.workday.calendar.components.script')
@endsection
