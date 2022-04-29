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
                                $photo = $candidatePartner->photo ? $candidatePartner->photo_link : $candidatePartner->default_photo_link;
                            @endphp
                            <img alt="image" src="{{ $photo }}" class="rounded-circle author-box-picture" width="150"
                                style="object-fit: cover; object-position: 50% 0%;">
                        </div>
                        <div class="author-box-details">
                            <div class="author-box-name">
                                {{ $candidatePartner->sequence_number? 'Nomor urut ' . $candidatePartner->sequence_number: 'Belum memiliki nomor urut' }}
                            </div>
                            <div class="author-box-description">
                                <p>{!! $candidatePartner->vision !!}</p>
                            </div>
                            <div class="mb-2 mt-3">
                                @if ($candidatePartner->is_pass_status === 'Lolos')
                                    <span
                                        class="badge badge-pill badge-success">{{ $candidatePartner->is_pass_status }}</span>
                                @elseif ($candidatePartner->is_pass_status === 'Tidak Lolos')
                                    <span
                                        class="badge badge-pill badge-danger">{{ $candidatePartner->is_pass_status }}</span>
                                @else
                                    <span
                                        class="badge badge-pill badge-info">{{ $candidatePartner->is_pass_status }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="w-100 d-sm-none"></div>
                        <div class="float-right mt-sm-0 mt-3">
                            <a href="{{ route('voting.index') }}" class="btn btn-sm btn-danger">Kembali</a>
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
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @php $i=0 @endphp
                                @foreach ($candidatePartner->candidates as $candidate)
                                    @php $i++ @endphp
                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <td>{{ $candidate->name }}</td>
                                        <td>{{ $candidate->status }}</td>
                                        <td>
                                            <div>
                                                <a href={{ route('voting.candidate.partner.show', ['voting' => $voting, 'candidate_partner' => $candidatePartner]) }}
                                                    type="button" class="btn btn-sm btn-outline-info">Detail</a>
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
