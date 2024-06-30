<x-dashboard-layout>
    <x-slot name="contentHeader">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Beranda</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <i class="nav-icon fas fa-house ml-1"></i>
                            Halaman Utama
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $guru }}</h3>

                        <p>Guru Besar</p>
                    </div>
                    <a href="{{ route('guru-besar') }}" class="small-box-footer">Ke Halaman Ini <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $pendidik }}</h3>

                        <p>Tenaga Kependidikan</p>
                    </div>
                    <a href="{{ route('tenaga-kependidikan') }}" class="small-box-footer">Ke Halaman Ini <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $berita }}</h3>

                        <p>Berita</p>
                    </div>
                    <a href="{{ route('berita') }}" class="small-box-footer">Ke Halaman Ini <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $akreditasi }}</h3>

                        <p>Akreditasi</p>
                    </div>
                    <a href="{{ route('akreditasi') }}" class="small-box-footer">Ke Halaman Ini <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            @if (isset($video))
            <div class="col-lg-6">
                <div class="card p-3">
                    <div class="video-container" style="position: relative; width: 100%; padding-bottom: 56.25%; height: 0; overflow: hidden;">
                        <video controls style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                            <source src="{{ asset('storage/' . $video->image_path) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-lg-6">
                <div class="card mt-3">
                    <div class="card-header">
                        <h2 class="text-lg font-medium text-gray-900">Tambahkan Video Profil</h2>
                    </div>
                    <div class="card-body">
                        <form id="addVideo" action="{{ route('store-video-profil') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <input class="form-control form-control-sm" type="file" name="image_path"
                                    placeholder="Choose video" id="image">
                                @error('image')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-dashboard-layout>