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
            <li><a class="nav-link" href="{{ route('committee.dashboard.index') }}"><i
                        class="fab fa-dashcube"></i>
                    <span>Dashboard</span></a></li>
            <li><a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-user"></i>
                    <span>Panitia</span></a></li>
            <li><a class="nav-link" href="{{ route('votings.index') }}"><i class="fas fa-vote-yea"></i>
                    <span>Voting</span></a></li>
            <li><a class="nav-link" href="{{ route('participants.index') }}"><i class="fas fa-users"></i>
                    <span>Partisipan</span></a></li>
            <li><a class="nav-link" href="{{ route('blogs.index') }}"><i class="fas fa-newspaper"></i>
                    <span>Blog</span></a></li>


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
