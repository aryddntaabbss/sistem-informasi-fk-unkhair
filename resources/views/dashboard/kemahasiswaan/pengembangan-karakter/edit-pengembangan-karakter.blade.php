<x-dashboard-layout>
    <x-slot name="contentHeader">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Pengembangan Karakter Mahasiswa</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <i class="nav-icon fas fa-house ml-1"></i>
                            Halaman Utama
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('pengembangan-karakter') }}">Pengembangan Karakter
                                Mahasiswa</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('edit-pengembangan-karakter') }}">Edit</a></li>
                    </ol>
                </div>
            </div>
            <div class="flex justify-between items-center mb-1 mt-3">
                <a href="{{ route('pengembangan-karakter') }}">
                    <x-blue-button type="submit" class="btn btn-secondary">Kembali</x-blue-button>
                </a>
            </div>
        </div>
    </x-slot>

    <form id="update-asrama" method="post" action="{{ route('update-pengembangan-karakter') }}"
        enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="container pb-2">

            <div class="card card-outline card-info">
                <div class="card-header">
                    <h2 class="card-title text-lg font-medium text-gray-900">
                        {{ __('Isi') }}
                    </h2>
                </div>

                <div class="card-body">
                    <textarea name="body" id="summernote">
                        {{ $data->body }}
                    </textarea>
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
    <script src="{{ asset('assets/plugins/summernote/summernote-bs5.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize Summernote
            $('#summernote').summernote({
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'italic', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
            });
        });
    </script>
    @endpush
</x-dashboard-layout>