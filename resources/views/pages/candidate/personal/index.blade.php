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
                            @if (count($candidates) < 2)
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
                                                        <a href="{{ route('candidate.personal.show', ['personal' => $candidate->id]) }}"
                                                            type="button" class="btn btn-sm btn-outline-info">Lihat
                                                            Detail</a>
                                                        <a href="{{ route('candidate.personal.edit', ['candidate' => $candidate->id]) }}"
                                                            type="button" class="btn btn-sm btn-outline-secondary">
                                                            Ubah</a>
                                                        <button class="btn btn-sm btn-outline-danger" data-toggle="modal"
                                                            data-target="#deleteModal{{ $candidate->id }}">Hapus</button>
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

<!-- Delete Modal -->
@foreach ($candidates as $candidate)
    <div class="modal fade" id="deleteModal{{ $candidate->id }}" tabindex="-1" role="dialog"
        aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Hapus
                        Jadwal Event
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action={{ route('candidate.personal.destroy', ['candidate' => $candidate->id]) }}
                        method="post">
                        @method('DELETE')
                        @csrf
                        <div class="modal-body">
                            <p>Apakah anda yakin ingin menghapus calon kandidat
                                <strong style="text-transform: uppercase">{{ $candidate->name }}</strong>?</br>
                                <small>NB: DATA CALON KETUA TIDAK DAPAT DIHAPUS</small>
                            </p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
<!-- End Delete Modal -->


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
