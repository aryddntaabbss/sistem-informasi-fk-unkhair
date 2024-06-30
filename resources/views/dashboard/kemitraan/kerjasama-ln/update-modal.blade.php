<div class="modal fade" id="updateModal{{ $k->id }}" tabindex="-1" aria-labelledby="updateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="createForm" method="post" action="{{ route('update-kerjasama-ln', $k->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="inputCountry" class="form-label">Country</label>
                        <input type="text" class="form-control" id="inputCountry"
                            placeholder="Cth: UNITED STATES OF AMERICA" name="country"
                            value="{{ old('country', $k->country) }}" required>
                    </div>
                    <div class="mb-1">
                        <label for="inputPartner" class="form-label">Partner</label>
                        <input type="text" class="form-control" id="inputPartner"
                            placeholder="Cth: San diego State University" name="partner"
                            value="{{ old('partner', $k->partner) }}" required>
                    </div>
                    <div class="mb-1">
                        <label for="inputFaculty" class="form-label">Faculty / University</label>
                        <input type="text" class="form-control" id="inputFaculty" placeholder="Cth: Universitas Khairun"
                            name="faculty" value="{{ old('faculty', $k->faculty) }}" required>
                    </div>
                    <div class="mb-1">
                        <label for="inputStart" class="form-label">Start</label>
                        <input type="number" class="form-control" id="inputStart" placeholder="Cth: 2017" name="start"
                            value="{{ old('start', $k->start) }}" required>
                    </div>
                    <div class="mb-1">
                        <label for="inputEnd" class="form-label">End</label>
                        <input type="number" class="form-control" id="inputEnd" placeholder="Cth: 2022" name="end"
                            value="{{ old('end', $k->end) }}" required>
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