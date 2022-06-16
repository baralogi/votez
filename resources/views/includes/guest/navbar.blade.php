<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
        aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ route('home.index') }}">Votez</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            {{-- <li class="nav-item active">
                <a class="nav-link" href="{{ route('home.index') }}">Home <span class="sr-only">(current)</span></a>
            </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('home.vacancy.index') }}">Lowongan Pekerjaan</a>
            </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li> --}}
        </ul>
        {{-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> --}}
        @auth
            @role('applicant')
                <a href="{{ route('user.dashboard.index') }}" class="btn btn-outline-primary my-2 my-sm-0">Dashboard</a>
            @else
                {{ 'Logged as ' . auth()->user()->name . ', Admin' }}
            @endrole
        @else
            <a href="{{ route('login') }}" class="btn btn-success mr-sm-2">Masuk</a>
            <a href="{{ route('register') }}" class="btn btn-outline-primary my-2 my-sm-0">Daftar</a>
        @endauth
    </div>
</nav>
