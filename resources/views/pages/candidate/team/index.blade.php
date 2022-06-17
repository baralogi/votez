@extends('layouts.candidate.app')

@section('title')
    <title>Votez &mdash; Kelola Visi Misi</title>
@endsection

@section('main')
    <div class="main-content">
        <section class="section">
            <x-header title="Team">
                <div class="breadcrumb-item">Visi Misi</div>
            </x-header>

            <div class="section-body">
                <x-title title="Kelola Visi Misi" lead="Kelola data team calon kandidat" />
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mt-5 mb-5">
                            @php
                                $photo = $candidatePartners->photo ? $candidatePartners->photo_link : $candidatePartners->default_photo_link;
                            @endphp
                            <img src="{{ $photo }}" style="object-fit: cover; object-position: 50% 50%;"
                                width="512" height="214" class="rounded elevation-2 mb-2" alt="Logo Image"
                                id="previewImage">
                            <div>
                                <a href={{ route('candidate.team.edit.photo', ['candidatePartner' => $candidatePartners->id]) }}
                                    class="btn btn-outline-info"><i class="fas fa-edit">&nbsp;&nbsp; Ubah
                                        Foto</i></a>
                            </div>
                        </div>
                        <div class="mt-5 mb-5">
                            @if ($candidatePartners->vision == null)
                                <p class="text-center">Belum ada Visi dan Misi</p>
                            @else
                                <div class="from-group col-md-12 col-12 mb-2">
                                    <label for="vision">Visi</label>
                                    <p>{!! $candidatePartners->vision !!}</p>
                                </div>
                                <div class="from-group col-md-12 col-12 mb-2">
                                    <label for="mision">Misi</label>
                                    <p>{!! $candidatePartners->mission !!}</p>
                                </div>
                            @endif
                            <div class="text-center">
                                <a href={{ route('candidate.team.edit', ['candidatePartner' => $candidatePartners->id]) }}
                                    class="btn btn-outline-success"><i class="fas fa-edit">&nbsp;&nbsp; Ubah
                                        Visi dan Misi</i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
