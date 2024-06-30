<x-dashboard-layout>
    <x-slot name="contentHeader">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Berita</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <i class="nav-icon fas fa-house ml-1"></i>
                            Halaman Utama
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('berita') }}">Berita</a></li>
                    </ol>
                </div>
            </div>
            <div class="flex justify-between items-center mb-1 mt-3">
                <a href="{{ route('berita') }}">
                    <x-blue-button type="submit" class="btn btn-primary">
                        {{ __('Kembali') }}
                    </x-blue-button>
                </a>
                <div class="flex">
                    <p class="mr-1">Dibuat pada : {{ $post->created_at->format('d M Y') }}</p>
                    <p>| Terakhir diubah : {{ $post->updated_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="container justify-center pb-2">

        <div class="card">
            <div class="card-header text-center">
                <h2 class="my-2 text-xl">{{ $post->title }}</h2>
            </div>
            <div class="card-body m-3">
                <img class="mx-auto rounded-md mb-4"
                    src="{{ asset('storage/' . $post->image_path ?? 'assets/img/logo-250.png') }}" alt=""
                    style="max-height: 25rem;">
                <div class="flex justify-between items-center mb-2">
                    <div class="col-md-8 sm:justify-start flex">
                        <span class="mr-3">
                            <h3><i class="nav-icon fas fa-eye mr-1"></i>{{ $post->view }}</h3>
                        </span>
                    </div>
                    <div class="col-md-4 flex justify-end md:justfy-start items-center">
                        <span>
                            <h3>Penulis : {{ $post->user->name }}</h3>
                        </span>
                    </div>
                </div>
                <hr class="text-lg">
                <div class="text-justify mt-4">
                    {!! $post->body !!}
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>