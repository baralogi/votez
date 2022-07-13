@extends('layouts.participant.app')

@section('title')
    <title>Votez</title>
@endsection

@section('main')
    <div class="main-wrapper container">
        @include('includes.participants.navbar')

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Daftar Calon Pemilihan</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ route('participant.voting.index') }}">Voting</a>
                        </div>
                        <div class="breadcrumb-item">Pasangan Calon</div>
                    </div>
                </div>

                <div class="section-body">
                    <div class="row">
                        @foreach ($candidatePartners as $candidatePartner)
                            <div class="col-md-6 my-2">
                                <div class="card">
                                    <img class="card-img-top" src="{{ $candidatePartner->photo }}"
                                        alt="Candidate Partner Image">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{ 'No Urut ' . $candidatePartner->sequence_number }}
                                        </h5>
                                        @if ($candidatePartner->candidates->count() == 1)
                                            <p class="card-title">
                                                {{ $candidatePartner->candidates[0]->status . ' : ' . $candidatePartner->candidates[0]->name }}
                                            </p>
                                        @else
                                            <p class="card-title">
                                                {{ $candidatePartner->candidates[0]->status . ' : ' . $candidatePartner->candidates[0]->name }}</br>
                                                {{ $candidatePartner->candidates[1]->status . ' : ' . $candidatePartner->candidates[1]->name }}
                                            </p>
                                        @endif
                                        <p class="card-title">Visi</p>
                                        <p class="card-text">{!! $candidatePartner->vision !!}</p>
                                        <p class="card-title">Misi</p>
                                        <p class="card-text">{!! $candidatePartner->mission !!}</p>
                                        <div class="card-footer text-center">
                                            <button class="btn btn-outline-info btn-lg">Detail Pasangan Calon</button>
                                            <form method="POST" class="d-inline" action="#">
                                                @csrf
                                                <input type="hidden" value="{{ $candidatePartner->id }}" />
                                                <button class="btn btn-primary btn-lg"
                                                    onclick="return confirm('Yakin ingin memilih pasangan calon?')">Pilih</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
        @include('includes.participants.footer')
    </div>
@endsection
