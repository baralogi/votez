@extends('layouts.supervisor.app')

@section('title')
    <title>Votez &mdash; Kelola Mahasiswa</title>
@endsection

@section('main')
    <div class="main-content">
        <section class="section">
            <x-header title="Mahasiswa">
                <div class="breadcrumb-item"><a href="{{ route('supervisor.student.recom') }}">Mahasiswa</a></div>
                <div class="breadcrumb-item">Detail Data</div>
            </x-header>
            <div class="section-body">
                <x-title title="Manajemen Panitia" lead="Detail Data Panitia Voting" />
                <form action="{{ route('supervisor.student.recom') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="">NIM</label>
                                    <input type="text" class="form-control" name="nim" value="{{ $student->nim }}">
                                </div>
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="">Nama</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $student->name }}">
                                </div>
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="">Jurusan</label>
                                    <input type="text" class="form-control" value="{{ $student->major }}">
                                </div>
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="">IPK</label>
                                    <input type="text" class="form-control" value="{{ $student->ipk }}">
                                </div>
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="">SSKM</label>
                                    <input type="text" class="form-control" value="{{ $student->sskm_point }}">
                                </div>
                                <div class="form-group col-6 col-12 mb-2">
                                    <label>Organisasi</label>
                                    <select class="form-control @error('organization_id') is_invalid @enderror"
                                        name="organization_id" id="organization_id">
                                        <option hidden>Pilih Komunitas</option>
                                        @foreach ($organizations as $organization)
                                            <option value="{{ $organization->id }}">{{ $organization->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label>Voting</label>
                                    <select class="form-control @error('voting_id') is_invalid @enderror" name="voting_id"
                                        id="voting_id"></select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <x-save-button />
                            <x-back-button route="{{ route('supervisor.student.index') }}" />
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#organization_id').on('change', function() {
                var organizationId = $(this).val();
                if (organizationId) {
                    $.ajax({
                        url: '/api/organizations/' + organizationId + '/votings',
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#voting_id').empty();
                                $('#voting_id').append('<option hidden>Pilih Voting</option>');
                                $.each(data, function(key, voting) {
                                    $('select[name="voting_id"]').append(
                                        '<option value="' + voting.id + '">' +
                                        voting
                                        .name + '</option>');
                                    console.log(voting.id, voting.name);
                                });
                            } else {
                                $('#voting_id').empty();
                            }
                        }
                    });
                } else {
                    $('#voting_id').empty();
                }
            });
        });
    </script>
@endpush
