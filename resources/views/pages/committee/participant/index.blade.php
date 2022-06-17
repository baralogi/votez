@extends('layouts.committee.app')

@section('title')
    <title>Votez &mdash; Kelola Partisipan</title>
@endsection

@section('main')
    <div class="main-content">
        <section class="section">
            <x-header title="Partisipan" />

            <div class="section-body">
                <x-title title="Kelola Partisipan" lead="Kelola partisipan" />
                <div class="card">
                    <div class="card-body">
                        {{ $dataTable->table(['class' => 'table table-striped']) }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
