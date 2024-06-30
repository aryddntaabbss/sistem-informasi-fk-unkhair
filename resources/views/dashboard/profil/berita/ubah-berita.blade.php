<x-dashboard-layout>
    <x-slot name="contentHeader">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Berita</h1>
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
        </div>
    </x-slot>

    <form id="update-sejarah" method="post" action="{{ route('update-berita', $post->slug) }}"
        enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="container pb-2">
            <div class="card">
                <div class="card-header flex items-center">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Tambah Gambar') }}
                    </h2>
                </div>

                <div class="card-body">
                    <div class="row">
                        <!-- Kolom Gambar -->
                        <div class="col-md-6">

                            <div class="flex justify-center">
                                <img id="image-preview" src="{{ asset('storage/' . $post->image_path) }}"
                                    alt="preview image" style="max-height: 250px;">
                            </div>

                            <!-- Buttons for Image -->
                            <div class="flex justify-center mt-3">
                                <label for="image" class="custom-label">
                                    <span type="button"
                                        class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm">Pilih
                                        Gambar Baru</span>
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

                            <div class="form-group">
                                <x-input-label for="title" :value="__('Judul')" />
                                <input id="title" name="title" type="text" class="form-control mt-1 block w-full"
                                    value="{{ old('title', $post->title) }}" required autofocus autocomplete="on" />
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>

                            <div class="form-group hidden">
                                <x-input-label for="slug" :value="__('Slug')" />
                                <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full"
                                    value="{{ old('slug', $post->slug) }}" required readonly />
                                <x-input-error class="mt-2" :messages="$errors->get('slug')" />
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card card-outline card-info">
                <div class="card-header">
                    <h2 class="card-title text-lg font-medium text-gray-900">
                        {{ __('Isi Artikel') }}
                    </h2>
                </div>

                <div class="card-body">
                    <textarea name="body" id="summernote">
                        {{ $post->body }}
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
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        // Function to generate slug from title
        function generateSlug(title) {
            return title.trim().toLowerCase().replace(/\s+/g, '-').replace(/[^a-z0-9-]/g, '');
        }

        // Event listener for title change
        title.addEventListener('change', function () {
            const generatedSlug = generateSlug(title.value);
            slug.value = generatedSlug;

            // Check if the generated slug already exists in the database
            fetch('/artikel/checkSlug?title=' + encodeURIComponent(title.value) + '&slug=' + encodeURIComponent(generatedSlug))
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // If the generated slug already exists, append a number to make it unique
                    if (data.exists) {
                        slug.value = generatedSlug + '-' + data.nextSuffix;
                    }
                })
                .catch(error => console.error('Error:', error));
        });

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