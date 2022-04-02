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
                <div class="breadcrumb-item">Detail Data</div>
            </x-header>
            <div class="section-body">
                <x-title title="Manajemen Kandidat" lead="Detail Data Kandidat" />
                <div class="card">
                    <div class="card-header">
                        <h4>Data Diri Kandidat</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="from-group col-md-6 col-12 mb-2">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ $candidates->name }}" readonly>
                            </div>
                            <div class="from-group col-md-6 col-12 mb-2">
                                <label for="nim">Nim</label>
                                <input type="text" class="form-control" id="nim" name="nim"
                                    value="{{ $candidates->nim }}" readonly>
                            </div>
                            <div class="from-group col-md-6 col-12 mb-2">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="{{ $candidates->email }}" readonly>
                            </div>
                            <div class="from-group col-md-6 col-12 mb-2">
                                <label for="phone">No. Handphone</label>
                                <input type="number" class="form-control" name="phone" id="phone"
                                    value="{{ $candidates->phone }}" readonly>
                            </div>
                            <div class="from-group col-md-6 col-12 mb-2">
                                <label>Voting</label>
                                <input type="text" class="form-control" value="{{ $candidates->voting->name }}"
                                    readonly>
                            </div>
                            <div class="from-group col-md-6 col-12 mb-2">
                                <label for="status">Jabatan</label>
                                <input type="text" class="form-control" name="status" id="status"
                                    value="{{ $candidates->status }}" readonly>
                            </div>
                            <div class="from-group col-md-6 col-12 mb-2">
                                <label for="status">Jenis Kelamin</label>
                                <input type="text" class="form-control" name="sex" id="sex"
                                    value="{{ $candidates->sex }}" readonly>
                            </div>
                            <div class="from-group col-md-6 col-12 mb-2">
                                <label for="address">Alamat</label>
                                <textarea type="text" class="form-control" name="address" id="address"
                                    readonly>{{ $candidates->address }}</textarea>
                            </div>
                            <div class="from-group col-md-6 col-12 mb-2">
                                <label for="birth_place">Tempat Lahir</label>
                                <input type="text" class="form-control" name="birth_place" id="birth_place"
                                    value="{{ $candidates->birth_place }}" readonly>
                            </div>
                            <div class="from-group col-md-6 col-12 mb-2">
                                <label for="birth_date">Tanggal Lahir</label>
                                <input type="text" class="form-control" name="birth_date" id="birth_date"
                                    value="{{ $candidates->birth_date }}" readonly>
                            </div>
                            <div class="form-group col-md-6 col-12 mb-2">
                                <label>Fakultas</label>
                                <input type="text" class="form-control" name="faculty" id="faculty"
                                    value="{{ $candidates->faculty }}" readonly>
                            </div>
                            <div class="form-group col-md-6 col-12 mb-2">
                                <label>Program Studi</label>
                                <input type="text" class="form-control" name="major" id="major"
                                    value="{{ $candidates->major }}" readonly>
                            </div>
                            <div class="form-group col-md-6 col-12 mb-2">
                                <label>Semester Sekarang</label>
                                <input type="text" class="form-control" name="faculty" id="faculty"
                                    value="{{ $candidates->semester }}" readonly>
                            </div>
                            <div class="form-group col-md-6 col-12 mb-2">
                                <label>IPK</label>
                                <input type="text" pattern="[0-9]+([\,|\.][0-9]+)?" step="0.01" class="form-control"
                                    name="ipk" id="ipk" value="{{ $candidates->ipk }}" readonly>
                            </div>
                            <div class="form-group col-md-6 col-12 mb-2">
                                <label>SSKM</label>
                                <input type="text" class="form-control" name="sskm" id="sskm"
                                    value="{{ $candidates->sskm }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{ route('candidate.personal.edit', ['candidate' => $candidates->id]) }}" type="button"
                            class="btn btn-info">
                            Ubah</a>
                        <x-back-button route="{{ route('candidate.personal.index') }}" />
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4>File Berkas Kandidat</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($candidates->candidateFiles as $file)
                            <p>{{ $file }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
