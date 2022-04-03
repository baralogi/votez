@extends('layouts.app')

@section('title')
    <title>Votez &mdash; Detail Calon Kandidat</title>
@endsection

@section('main')
    <div class="main-content">
        <section class="section">
            <x-header title="Kandidat" />
            <div class="section-body">
                <x-title title="Kelola Kandidat" lead="Kelola kandidat dengan mudah dan cepat" />
                <div class="card author-box card-primary">
                    <div class="card-body">
                        <div class="author-box-left">
                            @php
                                $photo = $candidate->photo ? $candidate->photo_link : $candidate->default_photo_link;
                            @endphp
                            <img alt="image" src="{{ $photo }}" class="rounded-circle author-box-picture" width="150"
                                style="object-fit: cover; object-position: 50% 0%;">
                        </div>
                        <div class="author-box-details">
                            <div class="author-box-name">
                                {{ $candidate->name }}
                            </div>
                            <div class="author-box-job">
                                {{ $candidate->sequence_number ? 'No urut:' . $candidate->sequence_number : 'Belum mendapat nomor urut' }}
                            </div>
                            <div class="author-box-description">
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Status &nbsp;: {{ $candidate->status }}</li>
                                            <li class="list-group-item">Email &nbsp;: {{ $candidate->email }}</li>
                                            <li class="list-group-item">Jenis Kelamin &nbsp;: {{ $candidate->sex }}</li>
                                            <li class="list-group-item">Tempat Lahir &nbsp;: {{ $candidate->birth_place }}
                                            </li>
                                            <li class="list-group-item">Fakultas &nbsp;: {{ $candidate->faculty }}</li>
                                            <li class="list-group-item">Semester &nbsp;: {{ $candidate->semester }}</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">NIM &nbsp;: {{ $candidate->nim }}</li>
                                            <li class="list-group-item">HP &nbsp;: {{ $candidate->phone }}</li>
                                            <li class="list-group-item">Tanggal Lahir &nbsp;:
                                                {{ $candidate->birth_date }}</li>
                                            <li class="list-group-item">Jurusan &nbsp;: {{ $candidate->major }}</li>
                                            <li class="list-group-item">IPK &nbsp;: {{ $candidate->ipk }}</li>
                                            <li class="list-group-item">SSKM &nbsp;: {{ $candidate->sskm }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 mt-3">
                                @if ($candidate->is_pass_status == 'Lolos')
                                    <span class="badge badge-pill badge-success">Lolos</span>
                                @elseif ($candidate->is_pass_status == 'Tidak Lolos')
                                    <span class="badge badge-pill badge-danger">Tidak Lolos</span>
                                @else
                                    <span class="badge badge-pill badge-info">Belum Terseleksi</span>
                                @endif
                            </div>
                            <div class="w-100 d-sm-none"></div>
                            <div class="float-right mt-sm-0 mt-3">
                                <a href="{{ route('candidates.index', ['voting' => $candidate->voting_id]) }}"
                                    class="btn btn-sm btn-danger">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Data Kandidat</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id='table-candidate-files' class="table table-md table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @php $i=0 @endphp
                                    @foreach ($candidate->candidateFiles as $file)
                                        @php $i++ @endphp
                                        <tr>
                                            <th scope="row">{{ $i }}</th>
                                            <td>{{ $file->filename }}</td>
                                            <td>{{ $file->filetype }}</td>
                                            <td>
                                                <div>
                                                    <a href="#" type="button" class="btn btn-sm btn-outline-info">Lihat
                                                        File</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
