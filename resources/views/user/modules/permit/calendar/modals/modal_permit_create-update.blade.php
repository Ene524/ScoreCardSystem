<div class="modal fade" id="modal-default" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">İzin Giriş</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal"
                      action="{{isset($permit)? route('user.permit.edit',['id'=>$permit->id]) :route('user.permit.create')}}"
                      method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Personel</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="employee_id" id="employee_id" style="width: 100%">
                                    <option value={{null}}>Personel Seç</option>
                                    @foreach($employees as $item)
                                        <option
                                            value="{{ $item->id}}" {{ isset($permit) && $permit->employee_id == $item->id ? "selected" : "" }}>{{$item->full_name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Başlangıç Tarihi</label>

                            <div class="col-sm-10">
                                <input  class="form-control" type="datetime-local" name="start_date" id="start_date"
                                        value="{{isset($permit) ? $permit->start_date->format('Y-m-d H:i'):date('Y-m-d H:i')}}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Bitiş Tarihi</label>

                            <div class="col-sm-10">
                                <input class="form-control" type="datetime-local" name="end_date" id="end_date"
                                       value="{{isset($permit) ? $permit->end_date->format('Y-m-d H:i'):date('Y-m-d H:i')}}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">İzin Türü</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="permit_type_id" id="permit_type_id" style="width: 100%">
                                    <option value={{null}}>İzin Türü Seç</option>
                                    @foreach($permitTypes as $item)
                                        <option
                                            value="{{ $item->id}}" {{ isset($permit) && $permit->permit_type_id == $item->id ? "selected" : "" }}>{{$item->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">İzin Durumu</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="permit_status_id" id="permit_status_id">
                                    <option value={{null}}>Durum Seç</option>
                                    @foreach($permitStatuses as $item)
                                        <option
                                            value="{{ $item->id}}" {{ isset($permit) && $permit->permit_status_id == $item->id ? "selected" : "" }}>{{$item->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Açıklama</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" id="description">{{isset($permit) ? $permit->description:""}}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button"
                                    data-bs-original-title=""
                                    title="" onclick="closeForm()">Vazgeç
                            </button>
                            <button class="btn btn-primary" type="button"
                                    data-bs-original-title=""
                                    title="" id="savePermit">Gönder
                            </button>

                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>

</div>
