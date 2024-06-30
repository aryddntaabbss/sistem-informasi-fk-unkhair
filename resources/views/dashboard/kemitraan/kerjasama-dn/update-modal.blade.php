<div class="modal fade" id="updateModal{{ $k->id }}" tabindex="-1" aria-labelledby="updateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateForm" method="post" action="{{ route('update-kerjasama-dn', $k->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="inputDepartemen" class="form-label">Departemen</label>
                        <input type="text" class="form-control" id="inputDepartemen"
                            placeholder="Cth: Dept. Teknik Sipil" name="departemen"
                            value="{{ old('departemen', $k->departemen) }}" required>
                    </div>
                    <div class="mb-1">
                        <label for="inputKetuaTim" class="form-label">Ketua Tim</label>
                        <input type="text" class="form-control" id="inputKetuaTim"
                            placeholder="Cth: Dr. Eng. Muhammad Isran Ramli, ST., MT" name="ketua_tim"
                            value="{{ old('ketua_tim', $k->ketua_tim) }}" required>
                    </div>
                    <div class="mb-1">
                        <label for="inputKerjasama" class="form-label">Kerjasama</label>
                        <input type="text" class="form-control" id="inputKerjasama" placeholder="Cth: Pemerintah"
                            name="kerjasama" value="{{ old('kerjasama', $k->kerjasama) }}" required>
                    </div>
                    <div class="mb-1">
                        <label for="inputMitra" class="form-label">Mitra</label>
                        <textarea class="form-control" id="inputMitra" rows="3"
                            placeholder="Cth: BAPPEDA KABUPATEN SORONG SELATAN" name="mitra"
                            required>{{ $k->mitra }}</textarea>
                    </div>
                    <div class="mb-1">
                        <label for="inputKegiatan" class="form-label">Kegiatan</label>
                        <textarea class="form-control" id="inputKegiatan" rows="3"
                            placeholder="Cth: DED Pembangunan Pelabuhan Kokoda Kab. Sorong Selatan" name="kegiatan"
                            required>{{ $k->kegiatan }}</textarea>
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