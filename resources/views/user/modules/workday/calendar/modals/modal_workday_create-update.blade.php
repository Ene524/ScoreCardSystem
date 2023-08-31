<div class="modal fade" id="modal-default" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Çalışma Günü Giriş</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal"
                      action="{{isset($workday)? route('user.workday.edit',['id'=>$workday->id]) :route('user.workday.create')}}"
                      method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Personel</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="employee_id" style="width: 100%">
                                    <option value={{null}}>Personel Seç</option>
                                    @foreach($employees as $item)
                                        <option
                                            value="{{ $item->id}}" {{ isset($workday) && $workday->employee_id == $item->id ? "selected" : "" }}>{{$item->full_name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Başlangıç Tarihi</label>

                            <div class="col-sm-10">
                                <input id="Test" class="form-control" type="datetime-local" name="start_date"
                                       value="{{isset($workday) ? $workday->start_date->format('Y-m-d H:i'):date('Y-m-d 09:00')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Bitiş Tarihi</label>

                            <div class="col-sm-10">
                                <input class="form-control" type="datetime-local" name="end_date"
                                       value="{{isset($workday) ? $workday->end_date->format('Y-m-d H:i'):date('Y-m-d 18:00')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Durum</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="status">
                                    <option value={{null}}>Durum Seç</option>
                                    <option value="0" {{isset($workday) & isset($workday->status)==null ? "selected" : "" }} >Pasif</option>
                                    <option value="1" {{isset($workday) & isset($workday->status)!=null ? "selected" : "" }}>Aktif</option>
                                </select>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="button" class="btn btn-default pull-right" style="margin-left: 5px" onclick="closeForm()">Vazgeç
                            </button>
                            <button type="submit" class="btn btn-info pull-right">Kaydet</button>

                        </div>

                    </div>


                </form>
            </div>

        </div>

    </div>

</div>
