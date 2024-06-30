<x-dashboard-layout>
    <x-slot name="contentHeader">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Galeri</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <i class="nav-icon fas fa-house ml-1"></i>
                            Halaman Utama
                        </li>
                        <li class="breadcrumb-item">GPM-PR</li>
                        <li class="breadcrumb-item"><a href="{{ route('galeri') }}">Galeri</a>
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
        @include('dashboard.galeri.create-modal')

        <div class="card mt-3">
            <div class="card-header">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Tabel Galeri') }}
                </h2>
            </div>

            <div class="card-body">
                @if (isset($data) && count($data) > 0)
                <div class="table-responsive">
                    <table id="tabelGuruBesar" class="table table-stripped table-sm align-middle">
                        <thead>
                            <tr class="text-center">
                                <th class="align-middle" style="width: 10%">No</th>
                                <th class="align-middle" style="width: 60%">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <span class="mr-2">Gambar</span>
                                    </div>
                                </th>
                                <th class="align-middle" style="width: 20%">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $a )
                            <tr class="text-center">
                                <td scope="row" class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">
                                    <img class="mx-auto rounded-md my-2" src="{{ asset('storage/' . $a->image_path) }}"
                                        alt="" style="max-height: 16rem;">
                                </td>
                                <td class="align-middle">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm rounded-sm btn-danger"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal{{ $a->id }}"
                                            data-article-id="{{ $a->id }}" data-article-name="{{ $a->nama }}"><i
                                                class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                    @include('dashboard.galeri.delete-modal')
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