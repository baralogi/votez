@extends('layouts.committee.app')

@section('title')
    <title>Votez &mdash; Ubah User</title>
@endsection

@section('main')
    <div class="main-content">
        <section class="section">
            <x-header title="User">
                <div class="breadcrumb-item"><a href="{{ route('committee.user.index') }}">Panitia</a></div>
                <div class="breadcrumb-item">Simpan Data</div>
            </x-header>
            <div class="section-body">
                <x-title title="Manajemen Panitia" lead="Simpan Data Panitia Voting" />
                <div class="card">
                    @hasanyrole('ketua panitia|panitia')
                        <form action="{{ route('committee.user.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="from-group col-md-6 col-12 mb-2">
                                        <label for="">Nama</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="from-group col-md-6 col-12 mb-2">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="from-group col-md-6 col-12 mb-2">
                                        <label for="">Kelompok</label>
                                        <input type="text" class="form-control"
                                            value="{{ auth()->user()->organization->name }}" disabled>
                                    </div>
                                    <div class="from-group col-md-6 col-12 mb-2">
                                        <label>Jabatan</label>
                                        <select class="form-control" name="roles">

                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}">{{ Str::title($role->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <x-save-button />
                                <x-back-button route="{{ route('committee.user.index') }}" />
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
