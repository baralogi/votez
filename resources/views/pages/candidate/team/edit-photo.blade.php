@extends('layouts.candidate.app')

@section('title')
    <title>Votez &mdash; Kelola Visi Misi</title>
@endsection

@section('main')
    <div class="main-content">
        <section class="section">
            <x-header title="Team">
                <div class="breadcrumb-item">Foto</div>
            </x-header>

            <div class="section-body">
                <x-title title="Kelola Foto" lead="Ubah foto calon kandidat" />
                <div class="card">
                    <form
                        action="{{ route('candidate.team.update.photo', ['candidatePartner' => $candidatePartners->id]) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="text-center mb-5">
                                @php
                                    $photo = $candidatePartners->photo ? $candidatePartners->photo_link : $candidatePartners->default_photo_link;
                                @endphp
                                <img src="{{ $photo }}" style="object-fit: cover; object-position: 50% 50%;"
                                    width="512" height="214" class="rounded elevation-2 mb-2" alt="Logo Image"
                                    id="previewImage">
                            </div>
                            <div class="col-sm form-group">
                                <label>Foto Kandidat</label>
                                <input type="file" class="form-control" name="photo" id="image">
                                @error('photo')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-outline-success"><i class="fas fa-edit">&nbsp;&nbsp;
                                    Ubah Foto</i></button>
                        </div>
                    </form>
                </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image").change(function() {
            readURL(this);
        });
    </script>
@endpush
