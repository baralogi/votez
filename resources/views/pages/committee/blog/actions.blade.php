<div>
    <a href="{{ route('committee.blog.show', ['blog' => $blog]) }}" class="btn btn-sm btn-outline-info">Detail</a>
    <a href="{{ route('committee.blog.edit', ['blog' => $blog]) }}" class="btn btn-sm btn-outline-primary">Ubah</a>
    <form method="POST" class="d-inline" action="{{ route('committee.blog.destroy', ['blog' => $blog]) }}">
        @method('delete')
        @csrf
        <input type="hidden" value="{{ $blog->id }}" />
        <button class="btn btn-outline-danger btn-sm"
            onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
    </form>
</div>
