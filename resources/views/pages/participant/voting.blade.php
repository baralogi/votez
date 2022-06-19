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
                    <h1>Vote Calon Kandidat</h1>
                    {{-- <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                        <div class="breadcrumb-item"><a href="#">Layout</a></div>
                        <div class="breadcrumb-item">Top Navigation</div>
                    </div> --}}
                </div>

                <div class="section-body">
                    <div class="card">
                        @foreach ($votings as $voting)
                            <div class="card-header">
                                <h4>{{ $voting->name }}</h4>
                            </div>
                        @endforeach
                        <div class="card-body">
                            <div class="row">
                                @foreach ($votings as $voting)
                                    @foreach ($voting->candidatePartners as $candidatePartner)
                                        {{-- @foreach ($candidatePartner->candidates as $candidate) --}}
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <img class="card-img-top" src="{{ $candidatePartner->photo_link }}"
                                                    alt="Card image cap" style="width: 100%; object-fit: cover">
                                                <div class="card-body">
                                                    <h5 class="card-title">
                                                        {{ 'No Urut ' . $candidatePartner->sequence_number }}
                                                    </h5>
                                                    <p class="card-title">
                                                        {{ $candidatePartner->candidates[0]->status . ' : ' . $candidatePartner->candidates[0]->name }}</br>
                                                        {{ $candidatePartner->candidates[1]->status . ' : ' . $candidatePartner->candidates[1]->name }}
                                                    </p>
                                                    <p class="card-title">Visi</p>
                                                    <p class="card-text">{!! $candidatePartner->vision !!}</p>
                                                    <p class="card-title">Misi</p>
                                                    <p class="card-text">{!! $candidatePartner->mission !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- @endforeach --}}
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer">
                            {{ $votings->links() }}
                        </div>

                    </div>
                </div>
            </section>
        </div>
        @include('includes.participants.footer')
        {{-- <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval
                    Azhar</a>
            </div>
            <div class="footer-right">

            </div>
        </footer> --}}
    </div>
@endsection
