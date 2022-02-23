<div>
    <a href="{{ route('users.show', ['user' => $user->id]) }}" class="btn btn-sm btn-outline-info">Detail</a>
    <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-sm btn-outline-primary">Ubah</a>
    <form method="POST" class="d-inline" action="">
        @method("delete")
        @csrf
        <input type="hidden" value="" />
        <button class="btn btn-outline-danger btn-sm"
            onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
    </form>
</div>
