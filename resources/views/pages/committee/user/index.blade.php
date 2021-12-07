@extends('layouts.app')

@section('title')
    <title>Votez &mdash; Kelola User</title>
@endsection

@section('main')
    <div class="main-content">
        <section class="section">
            <x-header title="User" />

            <div class="section-body">
                <x-title title="Kelola User" lead="Kelola pengguna dengan mudah dan cepat" />
                <div class="card">
                    <div class="card-header">
                        <h4>Data User</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {{ $dataTable->table(['class' => 'table table-md table-striped']) }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
