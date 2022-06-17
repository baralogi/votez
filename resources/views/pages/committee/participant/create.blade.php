@extends('layouts.committee.app')

@section('title')
    <title>Votez &mdash; Kelola Partisipan</title>>
@endsection

@section('main')
    <div class="main-content">
        <section class="section">
            <x-header title="Partisipan">
                <div class="breadcrumb-item"><a href="{{ route('committee.user.index') }}">Partisipan</a></div>
                <div class="breadcrumb-item">Simpan</div>
            </x-header>
            <div class="section-body">
                <x-title title="Kelola Partisipan" lead="Simpan Data Partisipan Voting" />
                <div class="card">
                    <form action="{{ route('committee.participant.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="identity_number">Identity Number</label>
                                    <input type="text" class="form-control" name="identity_number"
                                        value="{{ old('identity_number') }}">
                                    @error('identity_number')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="">Kelompok</label>
                                    <input type="text" class="form-control"
                                        value="{{ auth()->user()->organization->name }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <x-save-button />
                            <x-back-button route="{{ route('committee.participant.index') }}" />
                        </div>
                    </form>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection
