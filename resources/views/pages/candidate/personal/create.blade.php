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
                <div class="breadcrumb-item">Simpan Data</div>
            </x-header>
            <div class="section-body">
                <x-title title="Manajemen Kandidat" lead="Simpan Data Kandidat" />
                <div class="card">
                    <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="nim">Nim</label>
                                    <input type="number" class="form-control" name="nim">
                                </div>
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="phone">No. Handphone</label>
                                    <input type="number" class="form-control" name="phone">
                                </div>
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label>Kelompok</label>
                                    <input type="text" class="form-control"
                                        value="{{ auth()->user()->organization->name }}" disabled>
                                </div>
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="status">Jabatan</label>
                                    <input type="text" class="form-control" name="status" value="WAKIL KETUA" disabled>
                                </div>
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="gender">Jenis Kelamin</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="gender1"
                                                value="L">
                                            <label class="form-check-label" for="gender1">
                                                Laki Laki
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="gender2"
                                                value="P">
                                            <label class="form-check-label" for="gender2">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="address">Domisili</label>
                                    <input type="text" class="form-control" name="address">
                                </div>
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="born_place">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="born_place">
                                </div>
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="born_date">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="born_date">
                                </div>
                                <div class="form-group col-6">
                                    <label>Fakultas</label>
                                    <select class="form-control" name="faculty" id="faculty">
                                        <option hidden>Pilih Fakultas</option>
                                        @foreach ($faculties as $faculty)
                                            <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label>Program Studi</label>
                                    <select class="form-control" name="major" id="major"></select>
                                </div>
                                <div class="form-group col-6">
                                    <label>Semester Sekarang</label>
                                    <input type="number" class="form-control" name="semester" id="semester">
                                </div>
                                <div class="form-group col-6">
                                    <label>IPK</label>
                                    <input type="number" class="form-control" name="ipk" id="ipk">
                                </div>
                                <div class="form-group col-6">
                                    <label>SSKM</label>
                                    <input type="number" class="form-control" name="sskm" id="sskm">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <x-save-button />
                            <x-back-button route="{{ route('candidate.personal.index') }}" />
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#faculty').on('change', function() {
                var facultyId = $(this).val();
                if (facultyId) {
                    $.ajax({
                        url: '/api/faculties/' + facultyId + '/majors',
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#major').empty();
                                $('#major').append(
                                    '<option hidden>Pilih Program Studi</option>');
                                $.each(data.data, function(key, value) {
                                    console.log(value.name);
                                    $('select[name="major"]').append(
                                        '<option value="' + value.id + '">' +
                                        value.name + '</option>');
                                });
                            } else {
                                $('#major').empty();
                            }
                        }
                    });
                } else {
                    $('#major').empty();
                }
            });
        });
    </script>
@endpush
