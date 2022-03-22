@extends('layouts.auth')

@section('title')
    <title>Votez &mdash; Daftar</title>
@endsection

@section('main')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    {{-- <div class="login-brand">
                        <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div> --}}

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Daftar Calon Kandidat</h4>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger mt-2 mx-2">
                                <p><strong>Upss ada sesuatu yang salah........</strong></p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}" class="needs-validation">
                                @csrf
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="name">Nama</label>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" autofocus>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email"
                                        class="form-control  @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="password" class="d-block">Kata Sandi</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password2" class="d-block">Ulangi Kata Sandi</label>
                                        <input id="password2" type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            name=" password_confirmation">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
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
                                        <select class="form-control @error('voting_id') is_invalid @enderror"
                                            name="voting_id" id="voting_id"></select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">
                        &copy; {{ now()->year }} Votez. Made with 💙 by Sebastianus Sembara
                    </div>
                </div>
            </div>
        </div>
    </section>
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
