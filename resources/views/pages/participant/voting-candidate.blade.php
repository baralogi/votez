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
                    <h1>Daftar Calon</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ route('participant.voting.index') }}">Voting</a>
                        </div>
                        <div class="breadcrumb-item">Pasangan Calon</div>
                        <div class="breadcrumb-item">Calon</div>
                    </div>
                </div>

                <div class="section-body">
                    <div class="row">
                        @foreach ($candidates as $candidate)
                            <div class="col-md-6 my-2">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{ $candidate->name }}
                                        </h5>
                                        <div class="author-box-description">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">Status &nbsp;:
                                                            {{ $candidate->status }}</li>
                                                        <li class="list-group-item">Email &nbsp;: {{ $candidate->email }}
                                                        </li>
                                                        <li class="list-group-item">Jenis Kelamin &nbsp;:
                                                            {{ $candidate->sex }}</li>
                                                        <li class="list-group-item">Tempat Lahir &nbsp;:
                                                            {{ $candidate->birth_place }}
                                                        </li>
                                                        <li class="list-group-item">Fakultas &nbsp;:
                                                            {{ $candidate->faculty }}</li>
                                                        <li class="list-group-item">Semester &nbsp;:
                                                            {{ $candidate->semester }}</li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-6">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">NIM &nbsp;: {{ $candidate->nim }}</li>
                                                        <li class="list-group-item">HP &nbsp;: {{ $candidate->phone }}
                                                        </li>
                                                        <li class="list-group-item">Tanggal Lahir &nbsp;:
                                                            {{ $candidate->birth_date }}</li>
                                                        <li class="list-group-item">Jurusan &nbsp;:
                                                            {{ $candidate->major }}</li>
                                                        <li class="list-group-item">IPK &nbsp;: {{ $candidate->ipk }}
                                                        </li>
                                                        <li class="list-group-item">SSKM &nbsp;: {{ $candidate->sskm }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
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
