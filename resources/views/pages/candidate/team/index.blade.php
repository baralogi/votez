@extends('layouts.candidate.app')

@section('title')
    <title>Votez &mdash; Team</title>
@endsection

@section('main')
    <div class="main-content">
        <section class="section">
            <x-header title="Team" />

            <div class="section-body">
                <x-title title="Data Team" lead="Manajemen data team pasangan calon" />
                <div class="card">
                    <div class="card-body">
                        <div class="from-group col-md-12 col-12 mb-2">
                            <label for="vision">Visi</label>
                            <p>{!! $candidatePartners->vision !!}</p>
                        </div>
                        <div class="from-group col-md-12 col-12 mb-2">
                            <label for="mision">Misi</label>
                            <p>{!! $candidatePartners->mission !!}</p>
                        </div>
                        <div class="card-footer text-right">
                            <a href={{ route('candidate.team.edit', ['candidatePartner' => $candidatePartners->id]) }}
                                class="btn btn-outline-success"><i class="fas fa-edit">&nbsp;&nbsp; Ubah
                                    Visi dan Misi</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
