<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Votez</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">VT</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li><a class="nav-link" href="{{ route('candidate.dashboard.index') }}"><i
                        class="fab fa-dashcube"></i>
                    <span>Dashboard</span></a></li>
            <li><a class="nav-link" href="{{ route('candidate.team.index') }}"><i class="fas fa-eye"></i>
                    <span>Visi Misi</span></a></li>
            <li><a class="nav-link" href="{{ route('candidate.personal.index') }}"><i class="fas fa-users"></i>
                    <span>Pasangan Calon</span></a></li>


            {{-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                    <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                </ul>
            </li> --}}
        </ul>

        {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div> --}}
    </aside>
</div>
