@extends('layouts.app')

@section('title')
    <title>Votez &mdash; Kelola Data Voting</title>
@endsection

@section('main')
    <div class="main-content">
        <section class="section">
            <x-header title="Voting" />

            <div class="section-body">
                <x-title title="Kelola Data Voting" lead="Detail data voting" />
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
                                        <th scope="col">No. Urut</th>
                                        <th scope="col">Nama Ketua</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @php $i=0 @endphp
                                    @foreach ($voting->candidatePartners as $candidatePartner)
                                        @php $i++ @endphp
                                        <tr>
                                            @php
                                                $photo = $candidatePartner->photo ? $candidatePartner->photo_link : $candidatePartner->default_photo_link;
                                                $sequence_number = $candidatePartner->sequence_number ? $candidatePartner->sequence_number : '-';
                                            @endphp
                                            <th scope="row">{{ $i }}</th>
                                            <td>{{ $sequence_number }}</td>
                                            <td>{{ $candidatePartner->candidates[0]->name }}</td>
                                            <td>
                                                <img src="{{ $photo }}" alt="photo" border="0" width="40" height="40"
                                                    align="center" class="rounded-circle">
                                            </td>
                                            <td>
                                                <div>
                                                    <a href={{ route('voting.candidate-partner.index', ['voting' => $voting]) }}
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
