<x-dashboard-layout>
    <x-slot name="contentHeader">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Akreditasi</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <i class="nav-icon fas fa-house ml-1"></i>
                            Halaman Utama
                        </li>
                        <li class="breadcrumb-item">Akademik</li>
                        <li class="breadcrumb-item"><a href="{{ route('akreditasi') }}">Akreditasi</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="container pb-2">

        <button type="button" class="btn btn-success ml-auto" data-bs-toggle="modal" data-bs-target="#createModal">
            {{ __('Tambah') }}
        </button>

        <!-- Create Modal -->
        @include('dashboard.akademik.akreditasi.create-modal')

        <div class="card mt-3">
            <div class="card-header">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Tabel Data Akreditasi') }}
                </h2>
            </div>

            <div class="card-body">
                @if (isset($data) && count($data) > 0)
                <div class="table-responsive">
                    <table id="tabelKerjasama" class="table table-stripped table-sm align-middle">
                        <thead>
                            <tr class="text-center">
                                <th class="align-middle" style="width: 5%">No</th>
                                <th class="align-middle" style="width: 10%">Jenis Program</th>
                                <th class="align-middle" style="width:15%">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <span class="mr-2">Nama Program Studi</span>
                                    </div>
                                </th>
                                <th class="align-middle" style="width: 25%">Status/Peringkat</th>
                                <th class="align-middle" style="width: 20%">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <span class="mr-2">Akreditasi Nasional No. & Tgl. SK</span>
                                    </div>
                                </th>
                                <th class="align-middle" style="width: 15%">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <span class="mr-2">Tgl. Kadaluarsa</span>
                                    </div>
                                </th>
                                <th class="align-middle" style="width: 15%">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <span class="mr-2">Akreditasi & Sertifikasi
                                            Internasional</span>
                                    </div>
                                </th>
                                <th class="align-middle" style="width: 15%">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <span class="mr-2">Tgl. Berakhir Akreditasi
                                            Internasional</span>
                                    </div>
                                </th>
                                <th class="align-middle" style="width: 10%">Opsi</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($data as $a )
                            <tr class="text-center">
                                <td scope="row" class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $a->jenis }}</td>
                                <td class="align-middle">{{ $a->nama_prodi }}</td>
                                <td class="align-middle">{{ $a->peringkat }}</td>
                                <td class="align-middle">{{ $a->akreditasi_nas }}</td>
                                <td class="align-middle">{{ \Carbon\Carbon::parse($a->tgl_exp_akreditasi_nas)->format('d/m/Y') }}</td>
                                <td class="align-middle">{{ $a->akreditasi_inter }}</td>
                                <td class="align-middle">{{ \Carbon\Carbon::parse($a->tgl_exp_akreditasi_inter)->format('d/m/Y') }}</td>
                                <td class="align-middle">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm rounded-sm btn-primary"
                                            data-bs-toggle="modal" data-bs-target="#updateModal{{ $a->id }}"><i
                                                class="fa-solid fa-pen"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm rounded-sm btn-danger"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal{{ $a->id }}"
                                            data-article-id="{{ $a->id }}" data-article-name="{{ $a->nama_prodi }}"><i
                                                class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                    @include('dashboard.akademik.akreditasi.update-modal')
                                    @include('dashboard.akademik.akreditasi.delete-modal')
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center">
                    <p>Belum terdapat data. Klik tombol tambah</p>
                </div>
                @endif
            </div>
        </div>
    </div>

</x-dashboard-layout>