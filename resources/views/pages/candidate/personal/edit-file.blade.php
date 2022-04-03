@extends('layouts.candidate.app')

@section('title')
    <title>Votez &mdash; Tambah Kandidat</title>
@endsection

@section('main')
    <div class="main-content">
        <section class="section">
            <x-header title="Kandidat">
                <div class="breadcrumb-item"><a href="{{ route('candidate.dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('candidate.personal.index') }}">Personal</a></div>
                <div class="breadcrumb-item"><a href="{{ url()->previous() }}">Detail Data</a></div>
                <div class="breadcrumb-item">Unggah Berkas Data</div>
            </x-header>
            <div class="section-body">
                <x-title title="Manajemen Kandidat" lead="Simpan Data Kandidat" />
                <div class="card">
                    <form
                        action="{{ route('candidate.personal.file.update', ['candidate' => $candidates->id,'candidateFile' => $candidateFiles->id]) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="col-sm form-group">
                                <label>Ubah Berkas</label>
                                <input type="text" class="form-control" placeholder="Jenis Berkas"
                                    value="{{ $candidateFiles->filetype }}" disabled>
                            </div>
                            <div class="col-sm form-group">
                                <input type="file" class="form-control" name="filename" required>
                                @error('filename')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <x-save-button />
                            <x-back-button route="{{ url()->previous() }}" />
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
