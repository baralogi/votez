@extends('layouts.app')

@section('title')
    <title>Votez &mdash; Kelola User</title>
@endsection

@section('main')
    <div class="main-content">
        <section class="section">
            <x-header title="User">
                <div class="breadcrumb-item">Panitia</div>
            </x-header>
            <div class="section-body">
                <x-title title="Kelola User" lead="Kelola pengguna dengan mudah dan cepat" />
                <div class="card">
                    @hasanyrole('committee head|committee')
                        <div class="card-header">
                            <h4>Data User</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                {{ $dataTable->table(['class' => 'table table-md table-striped']) }}
                            </div>
                        </div>
                    @else
                        <div class="card-body p-5">
                            <h4 class="text-center">{{ __('403 | Tidak ada akses ') }}</h4>
                        </div>
                    @endhasanyrole
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
