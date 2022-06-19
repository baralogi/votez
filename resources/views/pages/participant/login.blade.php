@extends('layouts.participant.app')

@section('title')
    <title>Votez</title>
@endsection

@section('main')
    <section class="section">
        <div class="container mt-5">
            <div class="row">

                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="login-brand">
                        Votez
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Masukkan Token</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Silahkan Cek Email!, Sistem Mengirimkan Token Untuk Masuk Kedalam
                                Sistem</p>
                            <form method="POST" action="{{ route('participant.login') }}" class="needs-validation">
                                @csrf
                                <div class="form-group">
                                    <label for="identity_number">NIM</label>
                                    <input id="identity_number" type="text" class="form-control" name="identity_number"
                                        tabindex="1" required autofocus>
                                    @error('identity_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="token" class="control-label">Token</label>
                                        <div class="float-right">
                                            <a href="{{ route('participant.check.index') }}" class="text-small">
                                                Belum memiliki token?
                                            </a>
                                        </div>
                                    </div>
                                    <input id="token" type="password" class="form-control" name="token" tabindex="2"
                                        required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Masuk
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">
                        Votez Copyright &copy; {{ date('Y') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
