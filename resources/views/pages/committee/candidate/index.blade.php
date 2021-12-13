@extends('layouts.app')

@section('title')
    <title>Votez &mdash; Kelola Calon Kandidat</title>
@endsection

@section('main')
    <div class="main-content">
        <section class="section">
            <x-header title="Voting" />

            <div class="section-body">
                <x-title title="Kelola Calon Kandidat" lead="Kelola calon kandidat voting mu" />
                <div class="card author-box card-primary">
                    <div class="card-body">
                        <div class="author-box-left">
                            @php
                                $logoImage = $voting->logo ? $voting->logo_link : $voting->default_logo_link;
                            @endphp
                            <img alt="image" src="{{ $logoImage }}" class="rounded-circle author-box-picture" width="150"
                                style="object-fit: cover; object-position: 50% 0%;">
                        </div>
                        <div class="author-box-details">
                            <div class="author-box-name">
                                <a href="#">{{ $voting->name }}</a>
                            </div>
                            <div class="author-box-job">{{ $voting->start_at_format . ' - ' . $voting->end_at_format }}
                            </div>
                            <div class="author-box-description">
                                <p>{{ $voting->description }}</p>
                            </div>
                            <div class="mb-2 mt-3">
                                @if ($voting->voting_status == 'Aktif')
                                    <span class="badge badge-pill badge-success">Aktif</span>
                                @else
                                    <span class="badge badge-pill badge-danger">Tidak Aktif</span>
                                @endif
                            </div>
                            <div class="w-100 d-sm-none"></div>
                            <div class="float-right mt-sm-0 mt-3">
                                <a href="{{ route('votings.index') }}" class="btn btn-sm btn-outline-info">Lihat
                                    Peserta</a>
                                <a href="{{ route('votings.index') }}" class="btn btn-sm btn-danger">Kembali</a>
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
                            <table id='table-candidates' class="table table-md table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @php $i=0 @endphp
                                    @foreach ($voting->candidates as $candidate)
                                        @php $i++ @endphp
                                        <tr>
                                            @php
                                                $photo = $candidate->photo ? $candidate->photo_link : $candidate->default_photo_link;
                                            @endphp
                                            <th scope="row">{{ $i }}</th>
                                            <td>{{ $candidate->name }}</td>
                                            <td>{{ $candidate->is_pass_status }}</td>
                                            <td><img src="{{ $photo }}" alt="photo" border="0" width="40" height="40"
                                                    align="center" class="rounded-circle"></td>
                                            <td>
                                                <div>
                                                    <button type="button" class="btn btn-sm btn-outline-info"
                                                        id="buttonShowCandidate" data-toggle="modal"
                                                        data-target="#modalShowCandidate{{ $candidate->id }}">Detail</button>
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

@foreach ($voting->candidates as $candidate)
    <!-- show -->
    <div class="modal fade" id="modalShowCandidate{{ $candidate->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        Detail Bakal Calon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @php
                        $description = json_encode($candidate->description);
                        $x = json_decode($description);
                    @endphp
                    <img alt="image" class="mr-3 rounded-circle" width="70" src="{{ $photo }}">
                    <div class="media-body">
                        <div class="media-right">
                            <div class="text-primary">{{ $candidate->is_pass_status }}</div>
                        </div>
                        <div class="media-title mb-1">{{ $candidate->name }}</div>
                        <div class="text-time">
                            {{ $candidate->sequence_number ? 'No urut:' . $candidate->sequence_number : 'Belum mendapat nomor urut' }}
                        </div>
                        @if ($candidate->description)
                            <div class="media-description text-muted">{{ 'Visi: ' . $candidate->visi }}</div>
                            <div class="media-description text-muted">{{ 'Misi: ' . $candidate->misi }}</div>
                        @else
                            {{ '-' }}
                        @endif

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

@push('scripts')
    <script>
        $(document).ready(function() {
            var t = $('#table-candidates').DataTable({});

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
