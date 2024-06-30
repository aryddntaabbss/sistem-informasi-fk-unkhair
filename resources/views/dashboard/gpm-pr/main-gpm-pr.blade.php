<x-dashboard-layout>
    <x-slot name="contentHeader">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Gugus Penjaminan Mutu dan Peningkatan Reputasi FT-UKH</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <i class="nav-icon fas fa-house ml-1"></i>
                            Halaman Utama
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('gpm-pr') }}">GPM-PR</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="container pb-2">

        <div class="card mt-3">
            <div class="card-header">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Tabel Halaman GPM-PR') }}
                </h2>
            </div>

            <div class="card-body">
                @if (isset($data) && count($data) > 0)
                <div class="table-responsive">
                    <table id="tabelGuruBesar" class="table table-stripped table-sm align-middle">
                        <thead>
                            <tr class="text-center">
                                <th class="align-middle" style="width: 15%">No</th>
                                <th class="align-middle" style="width: 35%">Halaman</th>
                                <th class="align-middle" style="width: 35%">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <span class="mr-2">Data</span>
                                    </div>
                                </th>
                                <th class="align-middle" style="width: 15%">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $a )
                            <tr class="text-center">
                                <td class="align-middle">{{ $a->id }}</td>
                                <td class="align-middle">{{ $a->title }}</td>
                                <td class="align-middle">
                                    @if (isset($a->body))
                                    <a href="{{ route('show-gpm-pr', $a->id) }}">Lihat Detail</a>
                                    @else
                                    <p>-</p>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if (isset($a->body))
                                    <div class="btn-group">
                                        <a type="button" href="{{ route('edit-gpm-pr', $a->id) }}"
                                            class="btn btn-sm rounded-sm btn-secondary">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <a type="button" class="btn btn-sm rounded-sm btn-secondary"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal{{ $a->id }}"
                                            data-article-id="{{ $a->id }}" data-article-name="{{ $a->title }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </div>

                                    @include('dashboard.gpm-pr.delete-modal')
                                    @else
                                    <a type="button" href="{{ route('edit-gpm-pr', $a->id) }}"
                                        class="btn btn-sm rounded-sm btn-secondary">
                                        <i class="fa-solid fa-plus"></i>
                                        Tambah
                                    </a>
                                    @endif
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