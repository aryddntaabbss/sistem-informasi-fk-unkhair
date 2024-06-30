<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kerjasama Dalam Negeri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createForm" action="{{ route('store-kerjasama-ln') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="inputCountry" class="form-label">Country</label>
                        <input type="text" class="form-control" id="inputCountry"
                            placeholder="Cth: UNITED STATES OF AMERICA" name="country" required>
                    </div>
                    <div class="mb-1">
                        <label for="inputPartner" class="form-label">Partner</label>
                        <input type="text" class="form-control" id="inputPartner"
                            placeholder="Cth: San diego State University" name="partner" required>
                    </div>
                    <div class="mb-1">
                        <label for="inputFaculty" class="form-label">Faculty / University</label>
                        <input type="text" class="form-control" id="inputFaculty" placeholder="Cth: Universitas Khairun"
                            name="faculty" required>
                    </div>
                    <div class="mb-1">
                        <label for="inputStart" class="form-label">Start</label>
                        <input type="number" class="form-control" id="inputStart" placeholder="Cth: 2017" name="start"
                            required>
                    </div>
                    <div class="mb-1">
                        <label for="inputEnd" class="form-label">End</label>
                        <input type="number" class="form-control" id="inputEnd" placeholder="Cth: 2022" name="end"
                            required>
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