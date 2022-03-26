@extends('layouts.candidate.app')

@section('title')
    <title>Votez &mdash; Personal</title>
@endsection

@section('main')
    <div class="main-content">
        <section class="section">
            <x-header title="Personal">
                <div class="breadcrumb-item"><a href="{{ route('candidate.dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Personal</div>
            </x-header>

            <div class="section-body">
                <x-title title="Data Personal" lead="Manajemen data personal pasangan calon" />
                <div class="card">
                    <div class="card">
                        <div class="card-header">
                            @if ($candidates->count() == 1)
                                <a href="{{ route('candidate.personal.create') }}" class="btn btn-outline-success"><i
                                        class="fas fa-plus">&nbsp;&nbsp; Tambah
                                        Kandidat</i></a>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id='table-candidates' class="table table-md table-striped">
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
                                        @foreach ($candidates as $candidate)
                                            @php $i++ @endphp
                                            <tr>
                                                <th scope="row">{{ $i }}</th>
                                                <td>{{ $candidate->name }}</td>
                                                <td>{{ $candidate->status }}</td>
                                                <td>
                                                    <div>
                                                        <a href="{{ route('candidate.personal.show', ['candidate' => $candidate->id]) }}"
                                                            type="button" class="btn btn-sm btn-outline-info">Lihat
                                                            Detail</a>
                                                        <a href="{{ route('candidate.personal.edit', ['candidate' => $candidate->id]) }}"
                                                            type="button" class="btn btn-sm btn-outline-info">
                                                            Ubah</a>
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
