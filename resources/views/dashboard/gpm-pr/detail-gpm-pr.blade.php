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
                        <li class="breadcrumb-item"><a href="{{ route('gpm-pr') }}">GPM-PR</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('show-gpm-pr', $data->id) }}">{{ $data->title
                                }}</a></li>
                    </ol>
                </div>
            </div>

            <div class="flex justify-between items-center mt-3">
                <a href="{{ route('gpm-pr') }}">
                    <x-blue-button type="submit" class="btn btn-secondary">
                        Kembali
                    </x-blue-button>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="container justify-center pb-2">

        <div class="card">
            <div class="card-header">
                <div class="text-center my-1">{{ $data->title }}</div>
            </div>
            <div class="card-body m-3">
                <div class="text-justify mb-1">
                    {!! $data->body !!}
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>