<div class="modal fade" id="updateModal{{ $a->id }}" tabindex="-1" aria-labelledby="updateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Akreditasi "{{ $a->nama_prodi }}"</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateForm" method="post" action="{{ route('update-akreditasi', $a->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="inputJenisProgram" class="form-label">Jenis Program</label>
                        <input type="text" class="form-control" id="inputJenisProgram" placeholder="Cth: Sarjana"
                            name="jenis" value="{{ old('jenis', $a->jenis) }}" required>
                    </div>
                    <div class="mb-1">
                        <label for="inputProdi" class="form-label">Nama Program Studi</label>
                        <input type="text" class="form-control" id="inputProdi" placeholder="Cth: Teknik Sipil"
                            name="nama_prodi" value="{{ old('nama_prodi', $a->nama_prodi) }}" required>
                    </div>
                    <div class="mb-1">
                        <label for="inputPeringkat" class="form-label">Status/Peringkat</label>
                        <input type="text" class="form-control" id="inputPeringkat" placeholder="Cth: Unggul"
                            name="peringkat" value="{{ old('peringkat', $a->peringkat) }}" required>
                    </div>
                    <div class="mb-1">
                        <label for="inputAkreditasi_nas" class="form-label">Akreditasi Nasional No. & Tgl. SK</label>
                        <input type="text" class="form-control" id="inputAkreditasi_nas"
                            placeholder="Cth: 2087/SK/BAN-PT/Akred-PMT/S/III/2022" name="akreditasi_nas"
                            value="{{ old('akreditasi_nas', $a->akreditasi_nas) }}" required>
                    </div>
                    <div class="mb-1">
                        <label for="inputTgl_exp_akreditasi_nas" class="form-label">Tgl. Kadaluarsa</label>
                        <input type="date" class="form-control" id="inputTgl_exp_akreditasi_nas"
                            name="tgl_exp_akreditasi_nas"
                            value="{{ old('tgl_exp_akreditasi_nas', $a->tgl_exp_akreditasi_nas) }}" required>
                    </div>
                    <div class="mb-1">
                        <label for="inputAkreditasi_inter" class="form-label">Akreditasi & Sertifikasi
                            Internasional</label>
                        <input type="text" class="form-control" id="inputAkreditasi_inter"
                            placeholder="Cth: ABET, IABEE" name="akreditasi_inter"
                            value="{{ old('akreditasi_inter', $a->akreditasi_inter) }}">
                    </div>
                    <div class="mb-1">
                        <label for="inputTgl_exp_akreditasi_inter" class="form-label">Tgl. Berakhir Akreditasi
                            Internasional</label>
                        <input type="date" class="form-control" id="inputTgl_exp_akreditasi_inter"
                            name="tgl_exp_akreditasi_inter"
                            value="{{ old('tgl_exp_akreditasi_inter', $a->tgl_exp_akreditasi_inter) }}">
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