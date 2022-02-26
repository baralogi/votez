@extends('layouts.app')

@section('title')
    <title>Votez &mdash; Kelola User</title>
@endsection

@section('main')
    <div class="main-content">
        <section class="section">
            <x-header title="Panitia">
                <div class="breadcrumb-item"><a href="{{ route('users.index') }}">Panitia</a></div>
                <div class="breadcrumb-item">Detail Data</div>
            </x-header>
            <div class="section-body">
                <x-title title="Manajemen Panitia" lead="Detail Data Panitia Voting" />
                <div class="card">
                    @hasanyrole('ketua panitia|panitia')
                        <div class="card-body">
                            <fieldset disabled>
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
                            </fieldset>
                        </div>
                        <div class="card-footer text-right">
                            <x-back-button route="{{ route('users.index') }}" />
                        </div>
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
