@extends('layouts.app')

@section('title')
    <title>Votez &mdash; Kelola Blog</title>
@endsection

@section('main')
    <div class="main-content">
        <section class="section">
            <x-header title="Blog" />

            <div class="section-body">
                <x-title title="Kelola Blog" lead="Kelola blog dengan mudah dan cepat" />
                <div class="card">
                    <div class="card-header">
                        <h4>Data Blog</h4>
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
