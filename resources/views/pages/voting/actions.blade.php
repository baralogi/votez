<div>
    <a href="/votings/{{ $voting->id }}/edit" class="btn btn-outline-info btn-sm">Detail</a>
    <a href="/votings/{{ $voting->id }}/edit" class="btn btn-outline-primary btn-sm">Ubah</a>
    <form method="POST" class="d-inline" action="/votings/{{ $voting->id }}">
        @method("DELETE")
        @csrf
        <input type="hidden" value="{{ $voting->id }}" />
        <button class="btn btn-outline-danger btn-sm">Hapus</button>
    </form>
</div>
