<x-dashboard-layout>
    <x-slot name="contentHeader">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sejarah Singkat</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <i class="nav-icon fas fa-house ml-1"></i>
                            Halaman Utama
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('sejarah') }}">Sejarah Singkat</a></li>
                    </ol>
                </div>
            </div>

            <div class="flex justify-between items-center mb-1 mt-3">
                <a href="{{ route('edit-sejarah') }}">
                    <x-blue-button type="submit" class="btn btn-success">
                        {{ isset($data->body) ? 'Ubah' : 'Tambah' }}
                    </x-blue-button>
                </a>
                <div class="flex">
                    <p>Terakhir diubah : {{ $data->updated_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="container justify-center pb-2">

        <div class="card">
            <div class="card-body m-3">
                <div class="text-justify mt-4">
                    @if ($data->body != null)
                    <img class="mx-auto rounded-md mb-4" src="{{ asset('storage/' . $data->image_path) }}" alt=""
                        style="max-height: 25rem;">
                    {!! $data->body !!}
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