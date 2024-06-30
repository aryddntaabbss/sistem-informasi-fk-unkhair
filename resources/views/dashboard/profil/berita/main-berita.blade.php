<x-dashboard-layout>
    <x-slot name="contentHeader">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Berita</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <i class="nav-icon fas fa-house ml-1"></i>
                            Halaman Utama
                        </li>
                        <li class="breadcrumb-item">Profil</li>
                        <li class="breadcrumb-item"><a href="{{ route('berita') }}">Berita</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="container pb-2">

        <a href="{{ route('tambah-berita') }}" class="ml-auto">
            <button type="button" class="btn btn-success">
                {{ __('Tambah') }}
            </button>
        </a>

        <div class="card mt-3">
            <div class="card-header">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Tabel Berita') }}
                </h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if (isset($data) && count($data) > 0)
                <div class="table-responsive">
                    <table id="tabelArtikel" class="table table-stripped table-sm align-middle">
                        <thead>
                            <tr class="text-center">
                                <th class="align-middle" style="width: 5%">No</th>
                                <th class="align-middle" style="width: 40%">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <span class="mr-2">Judul</span>
                                    </div>
                                </th>
                                <th class="align-middle" style="width: 10%">Penulis</th>
                                <th class="align-middle" style="width: 10%">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <span class="mr-2">Tanggal dibuat</span>
                                    </div>
                                </th>
                                <th class="align-middle" style="width: 10%">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <span class="mr-2">Terakhir diperbarui</span>
                                    </div>
                                </th>
                                <th class="align-middle" style="width: 15%">Opsi</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($data as $post )
                            <tr class="text-center">
                                <td scope="row" class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $post->title }}</td>
                                <td class="align-middle">{{ $post->user->name }}</td>
                                <td class="align-middle">{{ $post->created_at->format('d M Y H:i') }}</td>
                                <td class="align-middle">{{ $post->updated_at->diffForHumans() }}</td>
                                <td class="align-middle">
                                    <div class="btn-group">
                                        <a href="{{ route('detail-berita', $post->slug) }}">
                                            <button type="button" class="btn btn-sm btn-secondary">Detail
                                            </button>
                                        </a>
                                        <button type="button"
                                            class="btn btn-sm btn-secondary dropdown-toggle dropdown-hover dropdown-icon"
                                            data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item"
                                                href="{{ route('edit-berita', $post->slug) }}">Ubah</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $post->id }}"
                                                data-article-id="{{ $post->id }}"
                                                data-article-name="{{ $post->title }}">Hapus</a>
                                        </div>
                                    </div>
                                    @include('dashboard.profil.berita.partials.delete-modal')
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->links() }}
                </div>
                @else
                <div class="text-center">
                    <p>Belum terdapat berita. Klik tombol tambah untuk menambah berita</p>
                </div>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</x-dashboard-layout>