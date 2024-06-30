<!-- Modal -->
<div class="modal fade modal-fullscreen-sm-down" id="deleteModal{{ $a->id }}" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Data Dosen</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('delete-dosen', $a->id) }}">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <p>Apakah anda yakin akan menghapus data dari "{{ $a->nama }}" ?</p>
                </div>
                <div class="modal-footer">
                    <x-secondary-button type="button" data-bs-dismiss="modal">Batal</x-secondary-button>
                    <x-blue-button type="submit" class="btn btn-danger">Hapus</x-blue-button>
                </div>
            </form>
        </div>
    </div>
</div>