<div>
    <a href="{{ route('committee.participant.edit', ['participant' => $participant]) }}"
        class="btn btn-sm btn-outline-primary">Ubah</a>
    <form method="POST" class="d-inline"
        action="{{ route('committee.participant.destroy', ['participant' => $participant]) }}">
        @method('delete')
        @csrf
        <input type="hidden" value="{{ $participant->id }}" />
        <button class="btn btn-outline-danger btn-sm"
            onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
    </form>
</div>
