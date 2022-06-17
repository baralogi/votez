@extends('layouts.committee.app')

@section('title')
    <title>Votez &mdash; Kelola Blog</title>
@endsection

@section('main')
    <div class="main-content">
        <section class="section">
            <x-header title="Blog">
                <div class="breadcrumb-item"><a href="{{ route('committee.blog.index') }}">Blog</a></div>
                <div class="breadcrumb-item">Simpan Data</div>
            </x-header>
            <div class="section-body">
                <x-title title="Kelola Blog" lead="Simpan Data Blog" />
                <div class="card">
                    <form action="{{ route('committee.blog.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="from-group col-md-6 col-12 mb-2">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="from-group col-md-12 col-12 mb-2">
                                    <label for="description">Deskripsi</label>
                                    <textarea id="description" name="description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <x-save-button />
                            <x-back-button route="{{ route('committee.blog.index') }}" />
                        </div>
                    </form>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection

@push('scripts')
    <script>
        $('#description').summernote({
            tabsize: 2,
            height: 300,
            minHeight: null,
            maxHeight: null,
            dialogsInBody: true
        });
    </script>
@endpush
