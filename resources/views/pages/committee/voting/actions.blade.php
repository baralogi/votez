<div>
    <a href="{{ route('voting.show', ['voting' => $voting->id]) }}" class="btn btn-sm btn-outline-info">Detail</a>
    <a href="{{ route('voting.edit', ['voting' => $voting->id]) }}" class="btn btn-sm btn-outline-primary">Ubah</a>
    <form method="POST" class="d-inline" action="{{ route('voting.destroy', ['voting' => $voting->id]) }}">
        @method("delete")
        @csrf
        <input type="hidden" value="{{ $voting->id }}" />
        <button class="btn btn-outline-danger btn-sm"
            onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
    </form>
</div>
