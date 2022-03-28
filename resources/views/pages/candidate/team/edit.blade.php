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
                    <form action="{{ route('candidate.team.update', ['candidatePartner' => $candidatePartners->id]) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="from-group col-md-12 col-12 mb-2">
                                <label for="vision">Visi</label>
                                <textarea id="vision" name="vision">{{ $candidatePartners->vision }}</textarea>
                            </div>
                            <div class="from-group col-md-12 col-12 mb-2">
                                <label for="mission">Misi</label>
                                <textarea id="mission" name="mission">{{ $candidatePartners->mission }}</textarea>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-outline-success"><i class="fas fa-edit">&nbsp;&nbsp; Ubah
                                    Visi dan Misi</i></button>
                        </div>
                    </form>
                </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        $('#vision').summernote({
            placeholder: 'Visi',
            tabsize: 2,
            height: 100,
            minHeight: null,
            maxHeight: null,
            dialogsInBody: true
        });
        $('#mission').summernote({
            placeholder: 'Misi',
            tabsize: 2,
            height: 100,
            minHeight: null,
            maxHeight: null,
            dialogsInBody: true
        });
    </script>
@endpush
