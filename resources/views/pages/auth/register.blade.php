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

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}" class="needs-validation">
                                @csrf
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="name">Nama</label>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name=" name"
                                            value="{{ old('name') }}" autofocus>
                                    </div>
                                </div>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email"
                                        class="form-control  @error('email') is-invalid @enderror" name=" email"
                                        value="{{ old('email') }}">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="password" class="d-block">Kata Sandi</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password">
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="form-group col-6">
                                        <label for="password2" class="d-block">Ulangi Kata Sandi</label>
                                        <input id="password2" type="password" class="form-control"
                                            name="password-confirm">
                                    </div>
                                    @error('password-confirm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Organisasi</label>
                                        <select class="form-control" name="organization" id="organization">
                                            <option hidden>Pilih Komunitas</option>
                                            @foreach ($organizations as $organization)
                                                <option value="{{ $organization->id }}">{{ $organization->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Voting</label>
                                        <select class="form-control" name="voting" id="voting"></select>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#organization').on('change', function() {
                var votingId = $(this).val();
                console.log(votingId);
                if (votingId) {
                    $.ajax({
                        url: '/api/organizations/' + votingId + '/votings',
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#voting').empty();
                                $('#voting').append('<option hidden>Pilih Voting</option>');
                                $.each(data, function(key, voting) {
                                    $('select[name="voting"]').append(
                                        '<option value="' + key + '">' + voting
                                        .name + '</option>');
                                });
                            } else {
                                $('#voting').empty();
                            }
                        }
                    });
                } else {
                    $('#voting').empty();
                }
            });
        });
    </script>
@endpush
