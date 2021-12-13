@extends('layouts.app')

@section('title')
    <title>Votez &mdash; Kelola Voting</title>
@endsection

@section('main')
    <div class="main-content">
        <section class="section">
            <x-header title="Voting" />

            <div class="section-body">
                <x-title title="Kelola Voting" lead="Kelola voting mu dengan mudah dan cepat" />
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
                                <a href="{{ route('votings.index') }}" class="btn btn-sm btn-info">Lihat Peserta</a>
                                <a href="{{ route('votings.index') }}" class="btn btn-sm btn-danger">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
                @include('pages.candidate.index')
            </div>
        </section>
    </div>
@endsection
