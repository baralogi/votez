@extends('layouts.participant.app')

@section('title')
    <title>Votez</title>
@endsection

@section('main')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        Votez
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Masukkan Token</h4>
                        </div>

                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <p class="alert alert-success">Silahkan Cek Email!, Sistem Mengirimkan Token Untuk Masuk Kedalam
                                Sistem</p>
                            <form method="POST" action="{{ route('participant.check.store') }}" class="needs-validation">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Token</label>
                                    <input id="token" type="text" class="form-control" name="token" tabindex="1"
                                        required autofocus>
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
