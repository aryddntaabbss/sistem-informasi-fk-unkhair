<x-dashboard-layout>
    <x-slot name="contentHeader">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Struktur Organisasi</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <i class="nav-icon fas fa-house ml-1"></i>
                            Halaman Utama
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('struktur') }}">Struktur Organisasi</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('edit-struktur') }}">Edit</a></li>
                    </ol>
                </div>
            </div>

            <div class="flex justify-between items-center mb-1 mt-3">
                <a href="{{ route('struktur') }}">
                    <x-blue-button type="submit" class="btn btn-secondary">Kembali</x-blue-button>
                </a>
            </div>
        </div>
    </x-slot>

    <form id="update-struktur" method="post" action="{{ route('update-struktur') }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="container pb-2">
            <div class="card">
                <div class="card-header flex items-center">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Gambar') }}
                    </h2>
                </div>

                <div class="card-body">
                    <div class="row align-items-center">
                        <!-- Kolom Gambar -->
                        <div class="col-md-6">

                            <div class="flex justify-center">
                                <img id="image-preview"
                                    src="{{ $data->image_path ? asset('storage/' . $data->image_path) : asset('assets/img/image-preview.jpg') }}"
                                    alt="preview image" style="max-height: 250px;">
                            </div>

                            <!-- Buttons for Image -->
                            <div class="flex justify-center mt-3">
                                <label for="image" class="custom-label">
                                    <span type="button"
                                        class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm">Pilih
                                        Gambar</span>
                                    <input class="hidden" type="file" name="image_path" placeholder="Choose image"
                                        id="image">
                                    @error('image')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </label>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <!-- Persyaratan Gambar -->
                            <div class="mb-2 justify-center">
                                <label class="block font-medium text-sm text-gray-700">
                                    <i class="nav-icon fas fa-warning text-warning mr-2"></i>
                                    {{ __('Persyaratan Gambar') }}
                                </label>
                                <p class="mt-1 text-sm text-gray-600">
                                    {{ __("Pastikan gambar yang Anda pilih memenuhi persyaratan berikut:") }}
                                </p>

                                <ul class="list-disc list-inside text-sm text-gray-600">
                                    <li>{{ __("Ukuran gambar maksimal 2MB.") }}</li>
                                    <li>{{ __("Format yang diterima: PNG, JPG, JPEG.") }}</li>
                                    <li>{{ __("Orientasi harus landscape / horizontal") }}</li>
                                </ul>
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

    @push('scripts')
    <!-- Summernote -->
    <script src="{{ asset('assets/plugins/summernote/summernote-bs5.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const imageInput = document.querySelector('#image');
            const imagePreview = document.querySelector('#image-preview');

            imageInput.addEventListener('change', function () {
                const file = this.files[0];
                const reader = new FileReader();

                reader.onload = function () {
                    imagePreview.src = reader.result;
                };

                if (file) {
                    reader.readAsDataURL(file);
                }
            });

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