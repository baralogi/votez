<div>
    <a href="{{ route('users.show', ['user' => $user->id]) }}" class="btn btn-sm btn-outline-info">Detail</a>
    <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-sm btn-outline-primary">Ubah</a>
    <form method="POST" class="d-inline" action="{{ route('users.destroy', ['user' => $user->id]) }}">
        @method("delete")
        @csrf
        <input type="hidden" value="{{ $user->id }}" />
        <button class="btn btn-outline-danger btn-sm"
            onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
    </form>
</div>
