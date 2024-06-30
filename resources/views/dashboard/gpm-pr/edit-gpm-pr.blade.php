<x-dashboard-layout>
    <x-slot name="contentHeader">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">GPM-PR</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <i class="nav-icon fas fa-house ml-1"></i>
                            Halaman Utama
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('gpm-pr') }}">GPM-PR</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </x-slot>

    <form id="update-asrama" method="post" action="{{ route('update-gpm-pr', $data->id) }}"
        enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="container pb-2">

            <div class="card card-outline card-info">
                <div class="card-header">
                    <h2 class="card-title text-lg font-medium text-gray-900">
                        {{ $data->title }}
                    </h2>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Halaman</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $data->title }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="summernote" class="form-label">Isi</label>
                        <textarea name="body" id="summernote">
                            {{ $data->body }}
                        </textarea>
                    </div>
                </div>
            </div>

            <!-- Tombol Save -->
            <div class="ml-auto">
                <x-primary-button>{{ __('Simpan') }}</x-primary-button>
            </div>
        </div>
    </form>

    @push('scripts')
    <!-- Summernote -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('#summernote').summernote({
                placeholder: 'Isi data halaman ini...',
                tabsize: 2,
                height: 350,
            });
        });
    </script>
    @endpush
</x-dashboard-layout>