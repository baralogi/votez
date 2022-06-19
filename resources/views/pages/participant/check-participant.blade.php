@extends('layouts.participant.app')

@section('title')
    <title>Votez</title>
@endsection

@section('main')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                    <div class="login-brand">
                        Votez
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Cek Data Peserta</h4>
                        </div>

                        <div class="card-body">
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('participant.check.store') }}" class="needs-validation">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-search"></i>
                                            </div>
                                        </div>
                                        <input id="identity_number" type="text" class="form-control"
                                            name="identity_number" autofocus placeholder="Nomor Identitas">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <select class="form-control @error('organization_id') is_invalid @enderror"
                                        name="organization_id" id="organization_id">
                                        <option hidden>Pilih Komunitas</option>
                                        @foreach ($organizations as $organization)
                                            <option value="{{ $organization->id }}">{{ $organization->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-lg btn-round btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">
                        Votez Copyright &copy; {{ date('Y') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
