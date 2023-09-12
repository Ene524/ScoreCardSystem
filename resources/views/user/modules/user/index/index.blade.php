@extends('user.layouts.master')
@section('title', 'Maaş Listesi')
@section('content')

    <div class="row">
        <div class="col-md-12">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif


            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title pull-left">Kullanıcı Listesi</h3>
                    <a href="{{ route('user.user.create') }}" class="btn btn-primary btn-sm btn-square pull-right">Kullanıcı
                        Oluştur</a>
                </div>
                <table class="table table-responsive table-striped">
                    <thead>
                        <tr class="border-bottom-primary">
                            <th scope="col">#</th>
                            <th scope="col">Adı</th>
                            <th scope="col">Email</th>
                            <th scope="col">Parola</th>
                            <th scope="col">Durumu</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th>{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->password }}</td>
                                @if ($user->status == 1)
                                    <td><span class="badge bg-green" name="status">Aktif</span></td>
                                @else
                                    <td><span class="badge bg-red" name="status">Pasif</span></td>
                                @endif
                                <td>
                                    <a href="{{ route('user.user.edit', ['id' => $user->id]) }}"
                                        class="btn btn-primary btn-xs editUser" data-id="{{ $user->id }}"
                                        data-toggle="tooltip" data-placement="top" title="Düzenle"><i
                                            class="fa fa-edit"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-xs deleteUser"
                                        data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-toggle="tooltip"
                                        data-placement="top" title="Sil"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('customStyle')
    @include('user.modules.user.index.components.style')
@endsection

@section('customScript')
    @include('user.modules.user.index.components.script')
@endsection
