@extends('layouts.app')

@section('title')
    <title>Votez &mdash; Kelola Voting</title>
@endsection

@section('main')
    <div class="main-content">
        <section class="section">
            <x-header title="Voting">
                <div class="breadcrumb-item"><a href="{{ route('votings.index') }}">Voting</a></div>
                <div class="breadcrumb-item">Ubah Data</div>
            </x-header>

            <div class="section-body">
                <x-title title="Manajemen Voting" lead="Ubah Data Voting" />
                <div class="card">
                    <form action="{{ route('votings.update', ['voting' => $voting->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-auto">
                                    @php
                                        $logoImage = $voting->logo ? $voting->logo_link : $voting->default_logo_link;
                                    @endphp
                                    <img src="{{ $logoImage }}" style="object-fit: cover; object-position: 50% 0%;"
                                        width="150" height="150" class="rounded-circle elevation-2 mb-2" alt="Logo Image"
                                        id="previewImage">
                                </div>
                                <div class="col-sm form-group">
                                    <label>Logo Voting</label>
                                    <input type="file" class="form-control" name="logo" id="image">
                                    @error('logo')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Nama Voting</label>
                                <input type="text" class="form-control" name="name"
                                    placeholder="ex: Badan Eksekutif Mahasiswa, Himpunan Mahasiswa Sistem Informasi"
                                    value="{{ $voting->name }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" name="description">{{ $voting->description }}</textarea>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pelaksanaan</label>
                                <input type="date" class="form-control datepicker" name="start_at"
                                    value="{{ $voting->start_at }}">
                                @error('start_at')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Berakhir</label>
                                <input type="date" class="form-control datepicker" name="end_at"
                                    value="{{ $voting->end_at }}">
                                @error('start_at')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Ubah</button>
                            <a href="{{ route('votings.index') }}" class="btn btn-outline-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image").change(function() {
            readURL(this);
        });
    </script>
@endpush
