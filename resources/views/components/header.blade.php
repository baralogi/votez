<div class="section-header">
    <h1>{{ $title }}</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('committee.dashboard.index') }}">Dashboard</a></div>
        {{ $slot }}
    </div>
</div>
