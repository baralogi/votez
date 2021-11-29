<div>
    <a href="/votings/{{ $voting->id }}/edit" class="btn btn-sm btn-outline-info">Detail</a>
    <a href="/votings/{{ $voting->id }}/edit" class="btn btn-sm btn-outline-primary">Ubah</a>
    {{-- <button class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#destroy">Hapus</button> --}}
    <form method="POST" class="d-inline" action="{{ route('votings.destroy', ['voting' => $voting->id]) }}">
        @method("delete")
        @csrf
        <input type="hidden" value="{{ $voting->id }}" />
        <button class="btn btn-outline-danger btn-sm"
            onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
    </form>
</div>

<script>

</script>
