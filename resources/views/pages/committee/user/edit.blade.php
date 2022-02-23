@extends('layouts.app')

@section('title')
    <title>Votez &mdash; Ubah User</title>
@endsection

@section('main')
    <div class="main-content">
        <section class="section">
            <x-header title="User">
                <div class="breadcrumb-item"><a href="{{ route('users.index') }}">Panitia</a></div>
                <div class="breadcrumb-item">Ubah</div>
            </x-header>
            <div class="section-body">
                <x-title title="Ubah User" lead="Ubah data pengguna" />
                <div class="card">
                    @hasanyrole('committee head|committee')
                        <div class="card-header">
                            <h4>Ubah Data User</h4>
                        </div>
                        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="row">
                                    <div class="from-group col-md-6 col-12 mb-2">
                                        <label for="">Nama</label>
                                        <input type="text" class="form-control" value="{{ $user->name }}">
                                    </div>
                                    <div class="from-group col-md-6 col-12 mb-2">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" value="{{ $user->email }}">
                                    </div>
                                    <div class="from-group col-md-6 col-12 mb-2">
                                        <label for="">Kelompok</label>
                                        <input type="text" class="form-control" value="{{ $user->organization->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-edit">&nbsp;
                                        Ubah</i></button>
                                <a href="{{ route('users.index') }}" class="btn btn-outline-danger"><i
                                        class="fas fa-arrow-alt-circle-left">&nbsp; Kembali</i></a>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="card-body p-5">
                        <h4 class="text-center">{{ __('403 | Tidak ada akses ') }}</h4>
                    </div>
                @endhasanyrole
            </div>
    </div>
    </section>
    </div>
@endsection
