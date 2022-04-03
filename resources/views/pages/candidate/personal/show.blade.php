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
                        @if (count($candidates->candidateFiles) == 0)
                            <a href="{{ route('candidate.personal.file.create', ['candidate' => $candidates->id]) }}"
                                class="btn btn-outline-success"><i class="fas fa-plus">&nbsp;&nbsp; Unggah
                                    Berkas</i></a>
                        @else
                            <div class="table-responsive">
                                <table id='table-candidate-files' class="table table-md table-striped">
                                    <thead class="text-center">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama File</th>
                                            <th scope="col">Jenis File</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @php $i=0 @endphp
                                        @foreach ($candidates->candidateFiles as $file)
                                            @php $i++ @endphp
                                            <tr>
                                                <th scope="row">{{ $i }}</th>
                                                <td>{{ $file->filename }}</td>
                                                <td>{{ $file->filetype }}</td>
                                                <td>
                                                    <div>
                                                        <a href="{{ asset('files/' . $file->filename) }}" target="_blank"
                                                            type="button" class="btn btn-sm btn-outline-info">Lihat
                                                            File</a>
                                                        <a href="#" target="_blank" type="button"
                                                            class="btn btn-sm btn-info">Ubah Berkas</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var t = $('#table-candidate-files').DataTable({});

            t.on('order.dt search.dt', function() {
                t.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();
        });
    </script>
@endpush
