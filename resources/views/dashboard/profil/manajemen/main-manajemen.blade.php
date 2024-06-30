<x-dashboard-layout>
    <x-slot name="contentHeader">
        <div class="container">
            <div class="row mb-2">
                <div class="col-lg-8">
                    <h1 class="m-0">Manajemen</h1>
                </div>

                <div class="col-lg-4">
                    <ol class="breadcrumb float-lg-right">
                        <li class="breadcrumb-item active">
                            <i class="nav-icon fas fa-house ml-1"></i>
                            Halaman Utama
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('manajemen') }}">Manajemen</a></li>
                    </ol>
                </div>
            </div>

            <div class="row items-center mb-1 mt-3">
                <div class="col-lg-8">
                    <a href="{{ route('edit-manajemen') }}">
                        <x-blue-button type="submit" class="btn btn-success">
                            {{ isset($data->image_path) ? 'Ubah' : 'Tambah' }}
                        </x-blue-button>
                    </a>
                </div>
                <div class="col-lg-4">
                    <div class="flex lg:justify-end">
                        <p>Terakhir diubah : {{ $data->updated_at->diffForHumans() }}</p>
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
                    <img class="mx-auto rounded-md" src="{{ asset('storage/' . $data->image_path) }}" alt=""
                        style="max-height: 36rem;">
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