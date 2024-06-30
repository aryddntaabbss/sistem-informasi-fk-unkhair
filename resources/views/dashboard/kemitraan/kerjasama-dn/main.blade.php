<x-dashboard-layout>
    <x-slot name="contentHeader">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kerjasama Dalam Negeri</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <i class="nav-icon fas fa-house ml-1"></i>
                            Halaman Utama
                        </li>
                        <li class="breadcrumb-item">Kemitraan</li>
                        <li class="breadcrumb-item"><a href="{{ route('kerjasama-dalam-negeri') }}">Kerjasama Dalam
                                Negeri</a>
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

        <!-- Modal -->
        @include('dashboard.kemitraan.kerjasama-dn.create-modal')

        <div class="card mt-3">
            <div class="card-header">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Tabel Data Kerjasama Dalam Negeri') }}
                </h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if (isset($data) && count($data) > 0)
                <div class="table-responsive">
                    <table id="tabelKerjasama" class="table table-stripped table-sm align-middle">
                        <thead>
                            <tr class="text-center">
                                <th class="align-middle" style="width: 10%">Kerjasama</th>
                                <th class="align-middle" style="width: 5%">No</th>
                                <th class="align-middle" style="width:15%">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <span class="mr-2">Mitra</span>
                                    </div>
                                </th>
                                <th class="align-middle" style="width: 25%">Kegiatan</th>
                                <th class="align-middle" style="width: 20%">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <span class="mr-2">Ketua Tim</span>
                                    </div>
                                </th>
                                <th class="align-middle" style="width: 15%">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <span class="mr-2">Departemen</span>
                                    </div>
                                </th>
                                <th class="align-middle" style="width: 10%">Opsi</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($data as $k )
                            <tr class="text-center">
                                <td class="align-middle">{{ $k->kerjasama }}</td>
                                <td scope="row" class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $k->mitra }}</td>
                                <td class="align-middle">{{ $k->kegiatan }}</td>
                                <td class="align-middle">{{ $k->ketua_tim }}</td>
                                <td class="align-middle">{{ $k->departemen }}</td>
                                <td class="align-middle">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm rounded-sm btn-primary"
                                            data-bs-toggle="modal" data-bs-target="#updateModal{{ $k->id }}"><i
                                                class="fa-solid fa-pen"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm rounded-sm btn-danger"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal{{ $k->id }}"
                                            data-article-id="{{ $k->id }}" data-article-name="{{ $k->kegiatan }}"><i
                                                class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                    @include('dashboard.kemitraan.kerjasama-dn.update-modal')
                                    @include('dashboard.kemitraan.kerjasama-dn.delete-modal')
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
            <!-- /.card-body -->
        </div>
    </div>
</x-dashboard-layout>