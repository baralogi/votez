@extends('layouts.auth')

@section('title')
    <title>Votez &mdash; Masuk</title>
@endsection

@section('main')
    <section class="section">
        <div class="d-flex flex-wrap align-items-stretch">
            <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                <div class="p-4 m-3">
                    <img src="{{ asset('images/undika-logo.png') }}" alt="logo" width="250" class="img-fluid mb-2 mt-2">
                    <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">E-Voting
                            Universitas Dinamika</span>
                    </h4>
                    <p class="text-muted">Sebelum kamu memulai, kamu harus masuk terlebih dahulu</p>
                    <form method="POST" action="{{ route('login') }}" class="needs-validation">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" tabindex="1" required autocomplete="email"
                                autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="control-label">Kata Sandi</label>
                            </div>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2"
                                required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                        id="remember-me">
                                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                                </div>
                            </div> --}}

                        <div class="form-group text-right">
                            {{-- <a href="auth-forgot-password.html" class="float-left mt-3">
                                Forgot Password?
                            </a> --}}
                            <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                                Masuk
                            </button>
                        </div>

                        <div class="mt-5 text-center">
                            Ingin menjadi pemimpin? <a href="{{ route('register') }}">Daftar calon
                                Kandidat</a>
                        </div>
                    </form>

                    <div class="text-center mt-2 text-small">
                        &copy; {{ now()->year }} Votez. Made with 💙 by Sebastianus Sembara
                        {{-- <div class="mt-2">
                            <a href="#">Privacy Policy</a>
                            <div class="bullet"></div>
                            <a href="#">Terms of Service</a>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom"
                data-background="{{ asset('images/login-banner.jpg') }}">
                <div class="absolute-bottom-left index-2">
                    <div class="text-light p-5 pb-2">
                        <div class="mb-5 pb-3">
                            <h1 class="mb-2 display-4 font-weight-bold">Universitas Dinamika</h1>
                            <h5 class="font-weight-normal text-muted-transparent">Surabaya, Indonesia</h5>
                        </div>
                        {{-- Photo by <a class="text-light bb" target="_blank"
                                href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a
                                class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
