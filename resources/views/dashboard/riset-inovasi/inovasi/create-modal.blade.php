<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Hasil Inovasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createForm" action="{{ route('store-inovasi') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="inputNamaInovasi" class="form-label">Nama Inovasi</label>
                        <input type="text" class="form-control" id="inputNamaInovasi" placeholder="Nama Inovasi"
                            name="nama_inovasi" required>
                    </div>
                    <div class="mb-1">
                        <label for="inputInovator" class="form-label">Inovator</label>
                        <input type="text" class="form-control" id="inputInovator" placeholder="Nama Inovator"
                            name="inovator" required>
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