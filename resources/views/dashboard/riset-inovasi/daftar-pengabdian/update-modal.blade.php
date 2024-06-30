<div class="modal fade" id="updateModal{{ $a->id }}" tabindex="-1" aria-labelledby="updateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Pengabdian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateForm" method="post" action="{{ route('update-daftar-pengabdian', $a->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="inputNama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="inputNama" placeholder="Nama" name="nama"
                            value="{{ old('nama', $a->nama) }}" required>
                    </div>
                    <div class="mb-1">
                        <label for="inputNip" class="form-label">NIP</label>
                        <input type="text" class="form-control" id="inputNip" placeholder="NIP" name="nip"
                            value="{{ old('nip', $a->nip) }}" required>
                    </div>
                    <div class="mb-1">
                        <label for="inputJudul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="inputJudul" placeholder="Judul Pengabdian"
                            name="judul" value="{{ old('judul', $a->judul) }}" required>
                    </div>
                    <div class="mb-1">
                        <label for="inputProgramStudi" class="form-label">Program Studi</label>
                        <input type="text" class="form-control" id="inputProgramStudi" placeholder="Program Studi"
                            name="prodi" value="{{ old('prodi', $a->prodi) }}" required>
                    </div>
                    <div class="mb-1">
                        <label for="inputTahun" class="form-label">Tahun</label>
                        <input type="number" class="form-control" id="inputProgramTahun" placeholder="Tahun Pengabdian"
                            name="tahun" value="{{ old('tahun', $a->tahun) }}" required>
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