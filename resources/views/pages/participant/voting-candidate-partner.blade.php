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
                    <h1>Daftar Pasangan Calon Kandidat</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ route('participant.voting.index') }}">Voting</a>
                        </div>
                        <div class="breadcrumb-item">Pasangan Calon</div>
                    </div>
                </div>
                @if ($checkHaveBeenVote === 1)
                    <div class="alert alert-warning" role="alert">
                        Anda sudah pernah memilih dalam voting ini!
                    </div>
                @endif

                <div class="section-body">
                    <div class="row">
                        @foreach ($candidatePartners as $candidatePartner)
                            @php
                                $photo = $candidatePartner->photo ? $candidatePartner->photo_link : $candidatePartner->default_photo_link;
                                $sequence_number = $candidatePartner->sequence_number ? $candidatePartner->sequence_number : '-';
                            @endphp
                            <div class="col-md-6 my-2">
                                <div class="card">
                                    <img class="card-img-top" src="{{ $photo }}" alt="Candidate Partner Image">
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
                                            <a href="{{ route('participant.voting.candidate-partner.show', ['voting' => $candidatePartner->voting_id, 'candidatePartner' => $candidatePartner->id]) }}"
                                                class="btn btn-outline-info btn-lg">Detail Pasangan Calon</a>
                                            @if ($checkHaveBeenVote === 0)
                                                <form method="POST" class="d-inline"
                                                    action="{{ route('participant.vote.candidate') }}">
                                                    @csrf
                                                    <input type="hidden" name="voting_id"
                                                        value="{{ $candidatePartner->voting_id }}" />
                                                    <input type="hidden" name="candidate_partner_id"
                                                        value="{{ $candidatePartner->id }}" />
                                                    <button class="btn btn-primary btn-lg"
                                                        onclick="return confirm('Yakin ingin memilih pasangan calon?')">Pilih</button>
                                                </form>
                                            @endif
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
