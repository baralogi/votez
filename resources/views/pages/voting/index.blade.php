@extends('layouts.app')

@section('title')
    <title>Votez &mdash; Kelola Voting</title>
@endsection

@section('main')
    <div class="main-content">
        <section class="section">
            <x-header title="Voting" />

            <div class="section-body">
                <x-title title="Kelola Voting" lead="Kelola voting mu dengan mudah dan cepat" />
                <div class="card">
                    <div class="card-header">
                        <h4>Data Voting</h4>
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
