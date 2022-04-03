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
                    <form action="{{ route('candidate.personal.file.store', ['candidate' => $candidates->id]) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="col-sm form-group">
                                <label>Surat Keterangan Aktif</label>
                                <input type="file" class="form-control" name="sk_aktif" required>
                                @error('sk_aktif')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-sm form-group">
                                <label>Transkrip Nilai</label>
                                <input type="file" class="form-control" name="tk_nilai" required>
                                @error('tk_nilai')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-sm form-group">
                                <label>Sertifikat LKMM-TD</label>
                                <input type="file" class="form-control" name="s_lkmmtd" required>
                                @error('s_lkmmtd')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-sm form-group">
                                <label>Surat Keterangan Aktif Organisasi</label>
                                <input type="file" class="form-control" name="sk_aktif_org" required>
                                @error('sk_aktif_org')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-sm form-group">
                                <label>Pengalaman Organisasi (2 Tahun Terakhir)</label>
                                <input type="file" class="form-control" name="s_org" required>
                                @error('s_org')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-sm form-group">
                                <label>Bukti Koalisi Ormawa ( Min: 3)</label>
                                <input type="file" class="form-control" name="bukti_koalisi" required>
                                @error('bukti_koalisi')
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
