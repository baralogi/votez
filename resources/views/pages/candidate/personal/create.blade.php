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
                    <form action="{{ route('candidate.personal.store') }}" method="post" enctype="multipart/form-data">
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
                                    <input type="number" class="form-control" id="nim" name="nim"
                                        value="{{ old('nim') }}">
                                    @error('nim')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
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
                                    <input type="number" class="form-control" name="phone" id="phone"
                                        value="{{ old('phone') }}">
                                    @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label>Voting</label>
                                    <input type="text" class="form-control"
                                        value="{{ auth()->user()->candidate->voting->name }}" disabled>
                                </div>
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="status">Jabatan</label>
                                    <input type="text" class="form-control" name="status" id="status" value="WAKIL KETUA"
                                        disabled>
                                </div>
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="gender">Jenis Kelamin</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sex" id="sex1" value="L">
                                            <label class="form-check-label" for="sex1">
                                                Laki Laki
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sex" id="sex2" value="P">
                                            <label class="form-check-label" for="sex2">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                    @error('sex')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="address">Alamat</label>
                                    <textarea type="text" class="form-control" name="address" id="address">{{ old('address') }}</textarea>
                                    @error('address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="birth_place">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="birth_place" id="birth_place"
                                        value={{ old('birth_place') }}>
                                    @error('birth_place')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="birth_date">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="birth_date" id="birth_date"
                                        value={{ old('birth_date') }}>
                                    @error('birth_date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label>Fakultas</label>
                                    <select class="form-control" name="faculty" id="faculty">
                                        <option hidden>Pilih Fakultas</option>
                                        @foreach ($faculties as $faculty)
                                            <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('faculty')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label>Program Studi</label>
                                    <select class="form-control" name="major" id="major"></select>
                                    @error('major')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label>Semester Sekarang</label>
                                    <input type="number" class="form-control" name="semester" id="semester"
                                        value={{ old('semester') }}>
                                    @error('semester')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label>IPK</label>
                                    <input type="number" pattern="[0-9]+([\,|\.][0-9]+)?" step="0.01" class="form-control"
                                        name="ipk" id="ipk" value={{ old('ipk') }}>
                                    @error('ipk')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label>SSKM</label>
                                    <input type="number" class="form-control" name="sskm" id="sskm"
                                        value={{ old('sskm') }}>
                                    @error('sskm')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" id="facultyText" name="facultyText" readonly>
                            <input type="hidden" id="majorText" name="majorText" readonly>
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
                let facultyId = $(this).val();
                let facultyText = $('#faculty :selected').text();
                $("#facultyText").attr("value", facultyText);
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
                                    $('select[name="major"]').append(
                                        '<option value="' + value.name + '">' +
                                        value.name + '</option>');
                                });
                                $('#major').on('change', function() {
                                    let majorText = $('#major :selected').text();
                                    $("#majorText").attr("value", majorText);
                                })
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
