<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kerjasama Dalam Negeri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createForm" action="{{ route('store-kerjasama-dn') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="inputDepartemen" class="form-label">Departemen</label>
                        <input type="text" class="form-control" id="inputDepartemen"
                            placeholder="Cth: Dept. Teknik Sipil" name="departemen" required>
                    </div>
                    <div class="mb-1">
                        <label for="inputKetuaTim" class="form-label">Ketua Tim</label>
                        <input type="text" class="form-control" id="inputKetuaTim"
                            placeholder="Cth: Dr. Eng. Muhammad Isran Ramli, ST., MT" name="ketua_tim" required>
                    </div>
                    <div class="mb-1">
                        <label for="inputKerjasama" class="form-label">Kerjasama</label>
                        <input type="text" class="form-control" id="inputKerjasama" placeholder="Cth: Pemerintah"
                            name="kerjasama" required>
                    </div>
                    <div class="mb-1">
                        <label for="inputMitra" class="form-label">Mitra</label>
                        <textarea class="form-control" id="inputMitra" rows="3"
                            placeholder="Cth: BAPPEDA KABUPATEN SORONG SELATAN" name="mitra" required></textarea>
                    </div>
                    <div class="mb-1">
                        <label for="inputKegiatan" class="form-label">Kegiatan</label>
                        <textarea class="form-control" id="inputKegiatan" rows="3"
                            placeholder="Cth: DED Pembangunan Pelabuhan Kokoda Kab. Sorong Selatan" name="kegiatan"
                            required></textarea>
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