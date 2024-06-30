<x-dashboard-layout>
    <x-slot name="contentHeader">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Profil Pengguna</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <i class="nav-icon fas fa-house ml-1"></i>
                            Halaman Utama
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('edit-profil') }}">Edit Profil Pengguna</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </x-slot>

    <form id="update-asrama" method="post" action="{{ route('update-profil') }}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="container pb-2">

            <div class="card card-outline card-info">

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $data->email }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" class="form-control" id="password" name="password">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <!-- Catatan -->
                            <div class="mb-2">
                                <label class="block font-medium text-sm text-gray-700">
                                    <i class="nav-icon fas fa-warning text-warning mr-2"></i>
                                    {{ __('Catatan') }}
                                </label>
                                <p class="mt-1 text-sm text-gray-600">
                                    {{ __("Kosongkan Password Jika tidak ingin mengubah.") }}
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Tombol Save -->
            <div class="ml-auto">
                <x-primary-button>{{ __('Simpan') }}</x-primary-button>
            </div>
        </div>
    </form>
</x-dashboard-layout>