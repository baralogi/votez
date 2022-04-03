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
                <div class="breadcrumb-item">Ubah Data</div>
            </x-header>
            <div class="section-body">
                <x-title title="Manajemen Kandidat" lead="Ubah Data Kandidat" />
                <div class="card">
                    <form action="{{ route('candidate.personal.update', ['candidate' => $candidates->id]) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="row">
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ $candidates->name }}">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="nim">Nim</label>
                                    <input type="text" class="form-control" id="nim" name="nim"
                                        value="{{ $candidates->nim }}">
                                    @error('nim')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        value="{{ $candidates->email }}">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="phone">No. Handphone</label>
                                    <input type="number" class="form-control" name="phone" id="phone"
                                        value="{{ $candidates->phone }}">
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
                                    <input type="text" class="form-control" name="status" id="status"
                                        value="{{ $candidates->status }}" readonly>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="gender">Jenis Kelamin</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sex" id="sex1" value="L"
                                                {{ $candidates->sex == 'L' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="sex1">
                                                Laki Laki
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sex" id="sex2" value="P"
                                                {{ $candidates->sex == 'P' ? 'checked' : '' }}>
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
                                    <textarea type="text" class="form-control" name="address" id="address">{{ $candidates->address }}</textarea>
                                    @error('address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="birth_place">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="birth_place" id="birth_place"
                                        value={{ $candidates->birth_place }}>
                                    @error('address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="birth_date">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="birth_date" id="birth_date"
                                        value={{ $candidates->birth_date }}>
                                    @error('birth_date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label>Fakultas</label>
                                    <select class="form-control" name="faculty" id="faculty">
                                        <option disabled>Pilih Fakultas</option>
                                        @foreach ($faculties as $faculty)
                                            <option value="{{ $faculty->id }}"
                                                {{ $faculty->name == $candidates->faculty ? 'selected' : '' }}>
                                                {{ $faculty->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('faculty')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label>Program Studi</label>
                                    <select class="form-control" name="major" id="major">
                                        <option value="{{ $candidates->major }}">
                                            {{ $candidates->major }}
                                        </option>
                                    </select>
                                    @error('major')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label>Semester Sekarang</label>
                                    <input type="number" class="form-control" name="semester" id="semester"
                                        value={{ $candidates->semester }}>
                                    @error('semester')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label>IPK</label>
                                    <input type="number" pattern="[0-9]+([\,|\.][0-9]+)?" step="0.01" class="form-control"
                                        name="ipk" id="ipk" value={{ $candidates->ipk }}>
                                    @error('ipk')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label>SSKM</label>
                                    <input type="number" class="form-control" name="sskm" id="sskm"
                                        value={{ $candidates->sskm }}>
                                    @error('sskm')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" id="facultyText" name="facultyText" value="{{ $candidates->faculty }}">
                            <input type="hidden" id="majorText" name="majorText" value="{{ $candidates->major }}"
                                readonly>
                        </div>
                        <div class="card-footer text-right">
                            <x-update-button />
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
                $("#facultyText").attr("value", facultyText.trim());
                if (facultyId) {
                    $.ajax({
                        url: '/api/faculties/' + facultyId + '/majors',
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#major').empty();
                                $('#major').append(
                                    '<option disabled selected>Pilih Program Studi</option>'
                                );
                                $.each(data.data, function(key, value) {
                                    $('select[name="major"]').append(
                                        '<option value="' + value.id + '">' +
                                        value.name + '</option>');
                                });
                                $('#major').on('change', function() {
                                    let majorText = $('#major :selected').text();
                                    $("#majorText").attr("value", majorText.trim());
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
