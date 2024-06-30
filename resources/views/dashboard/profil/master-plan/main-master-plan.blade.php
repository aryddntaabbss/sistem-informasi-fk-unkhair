<x-dashboard-layout>
    <x-slot name="contentHeader">
        <div class="container">
            <div class="row mb-2">
                <div class="col-lg-8">
                    <h1 class="m-0">Master Plan</h1>
                </div>

                <div class="col-lg-4">
                    <ol class="breadcrumb float-lg-right">
                        <li class="breadcrumb-item active">
                            <i class="nav-icon fas fa-house ml-1"></i>
                            Halaman Utama
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('master-plan') }}">Master Plan</a></li>
                    </ol>
                </div>
            </div>

            <div class="items-center mb-1 mt-3">
                <a href="#">
                    <x-blue-button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#updatePdf">
                        {{ isset($data->image_path) ? 'Ubah' : 'Tambah' }}
                    </x-blue-button>
                    @if ($data->image_path != null)
                    <x-blue-button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#deletePdf">
                        Hapus
                    </x-blue-button>
                    @endif
                </a>

                <!-- Ubah Dokumen Modal -->
                <div class="modal fade" id="updatePdf" tabindex="-1" aria-labelledby="updatePdfLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="uploadPdfLabel">Ubah Dokumen Master Plan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="uploadPdfForm" action="{{ route('update-master-plan') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="modal-body">
                                    <input type="file" name="image_path" id="file" class="form-control"
                                        placeholder="Pilih dokumen" required>
                                    <p class="text-danger mt-2">*Catatan: File yang di input harus berupa pdf</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Hapus Dokumen Modal -->
                <div class="modal fade" id="deletePdf" tabindex="-1" aria-labelledby="updatePdfLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="uploadPdfLabel">Hapus Dokumen Master Plan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="uploadPdfForm" action="{{ route('clear-master-plan') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="modal-body">
                                    <p>Apakah anda yakin ingin menghapus dokumen ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </x-slot>

    <div class="container justify-center">

        <div class="card">
            <div class="card-body">
                <div class="text-justify">
                    @if ($data->image_path != null)
                    <iframe class="mx-auto" src="{{ asset('/laraview/#../storage/'.$data->image_path) }}" width="100%"
                        height="700px"></iframe>
                    @else
                    <img class="mx-auto rounded-md mb-1" src="{{ asset('assets/img/no-data.png') }}" alt=""
                        style="max-height: 25rem;">
                    <p class="text-center">Belum terdapat data, Klik tombol tambah</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>