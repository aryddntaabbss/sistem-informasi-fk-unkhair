<x-dashboard-layout>
    <x-slot name="contentHeader">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Visi, Misi & Sasaran</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <i class="nav-icon fas fa-house ml-1"></i>
                            Halaman Utama
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('visi-misi') }}">Visi-Misi</a></li>
                    </ol>
                </div>
            </div>

            <div class="flex justify-start items-center mb-1 mt-3">
                <a href="{{ route('edit-visi-misi') }}">
                    <x-blue-button type="submit" class="btn btn-success">
                        {{ isset($data->body) ? 'Ubah' : 'Tambah' }}
                    </x-blue-button>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="container justify-center pb-2">
        <div class="card">
            <div class="card-body m-3">
                <div class="text-justify">
                    @if ($data->body != null)
                    {!! $data->body !!}
                    @else
                    <img class="mx-auto rounded-md" src="{{ asset('assets/img/no-data.png') }}" alt=""
                        style="max-height: 25rem;">
                    <p class="text-center">Belum terdapat data, Klik tombol tambah</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>