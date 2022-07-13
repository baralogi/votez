<div>
    <a href="{{ route('committee.voting.show', ['voting' => $voting->id]) }}"
        class="btn btn-sm btn-outline-info">Detail</a>
    <a href="{{ route('committee.voting.edit', ['voting' => $voting->id]) }}"
        class="btn btn-sm btn-outline-primary">Ubah</a>
    <form method="POST" class="d-inline" action="{{ route('committee.voting.destroy', ['voting' => $voting->id]) }}">
        @method('delete')
        @csrf
        <input type="hidden" value="{{ $voting->id }}" />
        <button class="btn btn-outline-danger btn-sm"
            onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
    </form>
    @if ($voting->is_active === 0)
        <form method="POST" class="d-inline"
            action="{{ route('committee.voting.active', ['voting' => $voting->id]) }}">
            @method('put')
            @csrf
            <button class="btn btn-outline-success btn-sm"
                onclick="return confirm('Yakin ingin mengaktifkan data?')">Aktif</button>
        </form>
    @else
        <form method="POST" class="d-inline"
            action="{{ route('committee.voting.nonactive', ['voting' => $voting->id]) }}">
            @method('put')
            @csrf
            <button class="btn btn-outline-danger btn-sm"
                onclick="return confirm('Yakin ingin menonaktifkan data?')">Tidak Aktif</button>
        </form>
    @endif
</div>
