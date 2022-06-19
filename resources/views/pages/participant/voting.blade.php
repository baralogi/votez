@extends('layouts.participant.app')

@section('title')
    <title>Votez</title>
@endsection

@section('main')
    <div class="main-wrapper container">
        @include('includes.participants.navbar')

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Vote Calon Kandidat</h1>
                    {{-- <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                        <div class="breadcrumb-item"><a href="#">Layout</a></div>
                        <div class="breadcrumb-item">Top Navigation</div>
                    </div> --}}
                </div>

                <div class="section-body">
                    <div class="card">
                        <div class="card-header">
                            <h4>Example Card</h4>
                        </div>
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <div class="card-footer bg-whitesmoke">
                            This is card footer
                        </div>
                    </div>
                </div>
            </section>
        </div>
        @include('includes.participants.footer')
        {{-- <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval
                    Azhar</a>
            </div>
            <div class="footer-right">

            </div>
        </footer> --}}
    </div>
@endsection
