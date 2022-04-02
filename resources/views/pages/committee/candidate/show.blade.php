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
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    @php
                                        $photo = $candidate->photo ? $candidate->photo_link : $candidate->default_photo_link;
                                    @endphp
                                    <div class="text-center">
                                        <img src="{{ $photo }}" style="object-fit: cover; object-position: 50% 0%;"
                                            width="150" height="150" class="rounded-circle elevation-2 mb-2" alt="Logo Image"
                                            id="previewImage">
                                    </div>
                                    <div class="text-center">
                                        @if ($candidate->is_pass_status == 'Lolos')
                                            <span class="badge badge-pill badge-success">Lolos</span>
                                        @elseif ($candidate->is_pass_status == 'Tidak Lolos')
                                            <span class="badge badge-pill badge-danger">Tidak Lolos</span>
                                        @else
                                            <span class="badge badge-pill badge-info">Belum Terseleksi</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="author-box-name">
                                        {{ $candidate->name }}
                                    </div>
                                    <div class="author-box-description">
                                        <p>{{ $candidate->sequence_number ? 'No urut:' . $candidate->sequence_number : 'Belum mendapat nomor urut' }}
                                        </p>
                                    </div>
                                    @php
                                        $data = json_encode($candidate->description);
                                        $description = json_decode($data);
                                    @endphp
                                    @if ($description)
                                        <div class="author-box-description">
                                            {{-- <p>{{ 'Visi: ' . $description->visi }}</p>
                                            <p>{{ 'Visi: ' . $description->misi }}</p> --}}
                                        </div>
                                    @else
                                        <div class="author-box-description">
                                            <p>{{ 'Belum ada deskripsi' }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right mt-sm-0 mt-3">
                            <a href="{{ route('candidates.index', ['voting' => $candidate->voting_id]) }}"
                                class="btn btn-sm btn-danger">Kembali</a>
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
