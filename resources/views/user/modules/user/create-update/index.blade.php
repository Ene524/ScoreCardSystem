@extends('user.layouts.master')
@section('title', 'Kullanıcı Oluştur')
@section('content')

    <div class="row">
        <div class="col-md-12">


            @if ($errors->all())
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Dikkat!</h4>
                    <p>İşleminiz gerçekleştirilemedi</p>
                    <hr>
                    @foreach ($errors->all() as $error)
                        <ul>
                            <li><i class="fa fa-angle-double-right txt-white m-r-10"></i>{{ $error }}</li>
                        </ul>
                    @endforeach
                </div>
            @endif

            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Kullanıcı Ekle</h3>
                </div>
                <form class="form-horizontal"
                    action="{{ isset($user) ? route('user.user.edit', ['id' => $user->id]) : route('user.user.create') }}"
                    method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputFullName3" class="col-sm-2 control-label">Adı</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="name" placeholder="Adı"
                                    value="{{ isset($user) ? $user->name : '' }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputFullName3" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="email" placeholder="Email"
                                    value="{{ isset($user) ? $user->email : '' }}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputFullName3" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="password" name="password" placeholder="Password"
                                    value="{{ isset($user) ? $user->password : '' }}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputFullName3" class="col-sm-2 control-label">Rol</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="role" id="role">
                                    <option value="Standart-User"
                                        {{ isset($user) && $user->hasRole('Standart-User') ? 'selected' : '' }}>
                                        Standart-User</option>
                                    @foreach ($roles as $role)
                                        @if ($role->name != 'Standart-User')
                                            <option value="{{ $role->id }}"
                                                {{ isset($user) && $user->hasRole($role->name) ? 'selected' : '' }}>
                                                {{ $role->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputFullName3" class="col-sm-2 control-label">Durum</label>

                            <div class="col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="status"
                                            {{ isset($user) && $user->status ? 'checked' : '' }}>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="box-footer">
                        <button type="button" class="btn btn-default pull-right" style="margin-left: 5px">Vazgeç
                        </button>
                        <button type="submit" class="btn btn-info pull-right">Kaydet</button>

                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection

@section('customStyle')
    @include('user.modules.user.create-update.components.style')
@endsection

@section('customScript')
    @include('user.modules.user.create-update.components.script')
@endsection
