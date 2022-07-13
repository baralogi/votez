@extends('layouts.supervisor.app')

@section('title')
    <title>Votez &mdash; Kelola Mahasiswa</title>
@endsection

@section('main')
    <div class="main-content">
        <section class="section">
            <x-header title="Mahasiswa">
                <div class="breadcrumb-item">Mahasiswa</div>
            </x-header>
            <div class="section-body">
                <x-title title="Manajemen Mahasiswa" lead="Daftar Mahasiswa" />
                <div class="card">
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
