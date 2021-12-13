@extends('layouts.app')

@section('title')
    <title>Votez &mdash; Kelola Partisipan</title>
@endsection

@section('main')
    <div class="main-content">
        <section class="section">
            <x-header title="Partisipan" />

            <div class="section-body">
                <x-title title="Kelola Partisipan" lead="Kelola partisipan dengan mudah dan cepat" />
                <div class="card">
                    <div class="card-header">
                        <h4>Data Partisipan</h4>
                    </div>
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
