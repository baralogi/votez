@extends('layouts.committee.app')

@section('title')
    <title>Votez &mdash; Kelola Blog</title>
@endsection

@section('main')
    <div class="main-content">
        <section class="section">
            <x-header title="Blog" />

            <div class="section-body">
                <x-title title="Kelola Blog" lead="Daftar Blog" />
                <div class="card">
                    <div class="card-body">
                        {{ $dataTable->table(['class' => 'table table-md table-striped']) }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
