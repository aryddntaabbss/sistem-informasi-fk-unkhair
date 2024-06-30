<div class="modal fade" id="updateModal{{ $a->id }}" tabindex="-1" aria-labelledby="updateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Inovasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateForm" method="post" action="{{ route('update-inovasi', $a->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="inputNamaInovasi" class="form-label">Nama Inovasi</label>
                        <input type="text" class="form-control" id="inputNamaInovasi" placeholder="Nama Inovasi"
                            name="nama_inovasi" value="{{ old('nama_inovasi', $a->nama_inovasi) }}" required>
                    </div>
                    <div class="mb-1">
                        <label for="inputInovator" class="form-label">Inovator</label>
                        <input type="text" class="form-control" id="inputInovator" placeholder="Nama Inovator"
                            name="inovator" value="{{ old('inovator', $a->inovator) }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>