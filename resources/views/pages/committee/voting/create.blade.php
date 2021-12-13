@extends('layouts.app')

@section('title')
    <title>Votez &mdash; Kelola Voting</title>
@endsection

@section('main')
    <div class="main-content">
        <section class="section">
            <x-header title="Voting" />

            <div class="section-body">
                <x-title title="Kelola Voting" lead="Kelola voting mu dengan mudah dan cepat" />
                <div class="card">
                    <div class="card-header">
                        <h4>Buat Voting Baru</h4>
                    </div>
                    <form action="{{ route('votings.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-auto">
                                    <img src="{{ asset('images/voting_logo.png') }}"
                                        style="object-fit: cover; object-position: 50% 0%;" width="150" height="150"
                                        class="rounded-circle elevation-2 mb-2" alt="Logo Image" id="previewImage">
                                </div>
                                <div class="col-sm form-group">
                                    <label>Logo Voting</label>
                                    <input type="file" class="form-control" name="logo" id="image">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Voting</label>
                                <input type="text" class="form-control" name="name"
                                    placeholder="ex: Badan Eksekutif Mahasiswa, Himpunan Mahasiswa Sistem Informasi">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pelaksanaan</label>
                                <input type="date" class="form-control datepicker" name="start_at">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Berakhir</label>
                                <input type="date" class="form-control datepicker" name="end_at">
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Simpan</button>
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