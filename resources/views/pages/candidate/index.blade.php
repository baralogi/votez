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
                            <img src="{{ $logoImage }}" style="object-fit: cover; object-position: 50% 0%;" width="150"
                                height="150" class="rounded-circle elevation-2 mb-2 mr-5" alt="Logo Image" id="previewImage">
                            <div class="clearfix"></div>
                        </div>
                        <div class="author-box-details">
                            <div class="author-box-name">
                                <a href="#">{{ $voting->name }}</a>
                                @if ($voting->voting_status == 'Aktif')
                                    <span class="badge badge-pill badge-success">Aktif</span>
                                @else
                                    <span class="badge badge-pill badge-danger">Tidak Aktif</span>
                                @endif
                            </div>
                            <div class="author-box-job">{{ $voting->start_at_format . ' - ' . $voting->end_at_format }}
                            </div>
                            <div class="author-box-description">
                                <p>{{ $voting->description }}</p>
                            </div>
                            <div class="mb-2 mt-3">
                                <a href="{{ route('votings.index') }}" class="btn btn-sm btn-info">Kembali</a>
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
                            <table id='table-candidates' class="table table-striped table-md">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">No Urut</th>
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
                                            <td>{{ $candidate->number_of_partner }}</td>
                                            <td>{{ $candidate->is_pass_status }}</td>
                                            <td><img src="{{ $photo }}" alt="photo" border="0" width="40" height="40"
                                                    align="center" class="rounded-circle"></td>
                                            <td>
                                                <div>
                                                    <a href="" class="btn btn-sm btn-outline-info">Detail</a>
                                                    <a href="" class="btn btn-sm btn-outline-primary">Ubah</a>
                                                    <form method="POST" class="d-inline" action="">
                                                        @method("delete")
                                                        @csrf
                                                        <input type="hidden" value="{{ $candidate->id }}" />
                                                        <button class="btn btn-outline-danger btn-sm"
                                                            onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                                                    </form>
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
