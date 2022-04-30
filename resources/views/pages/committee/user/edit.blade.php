@extends('layouts.app')

@section('title')
    <title>Votez &mdash; Ubah User</title>
@endsection

@section('main')
    <div class="main-content">
        <section class="section">
            <x-header title="User">
                <div class="breadcrumb-item"><a href="{{ route('user.index') }}">Panitia</a></div>
                <div class="breadcrumb-item">Ubah Data</div>
            </x-header>
            <div class="section-body">
                <x-title title="Manajemen Panitia" lead="Ubah Data Panitia Voting" />
                <div class="card">
                    @hasanyrole('ketua panitia|panitia')
                        <form action="{{ route('user.update', ['user' => $user->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="row">
                                    <div class="from-group col-md-6 col-12 mb-2">
                                        <label for="">Nama</label>
                                        <input type="text" class="form-control" value="{{ $user->name }}" name="name">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="from-group col-md-6 col-12 mb-2">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" value="{{ $user->email }}" disabled>
                                    </div>
                                    <div class="from-group col-md-6 col-12 mb-2">
                                        <label for="">Kelompok</label>
                                        <input type="text" class="form-control" value="{{ $user->organization->name }}"
                                            disabled>
                                    </div>
                                    <div class="from-group col-md-6 col-12 mb-2">
                                        <label>Jabatan</label>
                                        <select class="form-control" name="roles">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}"
                                                    {{ $role->id === $user->roles[0]->id ? 'selected' : '' }}>
                                                    {{ Str::title($role->name) }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <x-update-button />
                                <x-back-button route="{{ route('user.index') }}" />
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
