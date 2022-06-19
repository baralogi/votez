@extends('layouts.guest.app')

@section('title')
    <title>Votez</title>
@endsection

@section('main')
    <section class="py-5 py-md-0">
        <div class="jumbotron">
            <h2 class="h1-responsive">Selamat Datang</h2>
            <p class="lead">Pemilihan Raya Universitas Dinamika</p>
            <hr class="my-2">
            <p class="lead fw-normal text-muted">Pemilu bukan untuk memilih yang terbaik, namun
                mencegah yang buruk untuk berkuasa</p>
            <p class="blockquote-footer">Franz Magnis Suseno</p>
            <a class="btn btn-primary btn-lg" role="button" href="{{ route('participant.check.index') }}">Mulai
                Voting</a>
        </div>
    </section>
    <section class="py-5 py-md-0">
        @include('layouts.guest.blog')
    </section>
@endsection
