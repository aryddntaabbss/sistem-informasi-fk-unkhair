<x-dashboard-layout>
    <x-slot name="contentHeader">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Artikel</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <i class="nav-icon fas fa-house ml-1"></i>
                            Halaman Utama
                        </li>
                        <li class="breadcrumb-item">Profil</li>
                        <li class="breadcrumb-item"><a href="{{ route('berita') }}">Berita</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('tambah-berita') }}">Tambah Berita</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </x-slot>

    <form id="update-sejarah" method="post" action="{{ route('store-berita') }}" enctype="multipart/form-data">
        @csrf
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
                                <img id="image-preview" src="{{ asset('assets/img/image-preview.jpg') }}"
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

                        <!-- Kolom Input -->
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

                            <!-- Input Judul -->
                            <div class="form-group">
                                <x-input-label for="title" :value="__('Judul')" />
                                <input id="title" name="title" type="text" class="form-control mt-1 block w-full" autofocus
                                    autocomplete="on" />
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>


                            <!-- Input slug #hidden -->
                            {{-- <div class="form-group hidden">
                                <x-input-label for="slug" :value="__('Slug')" />
                                <x-text-input type="text" id="slug" name="slug" class="mt-1 block w-full"
                                    value="{{ old('slug') }}" readonly />
                                <x-input-error class="mt-2" :messages="$errors->get('slug')" />
                            </div> --}}
                        </div>
                    </div>

                </div>
            </div>

            <div class="card card-outline card-info">
                <div class="card-header">
                    <h2 class="card-title text-lg font-medium text-gray-900">
                        {{ __('Isi Berita') }}
                    </h2>
                </div>

                <div class="card-body">
                    <textarea name="body" id="summernote">
                    </textarea>
                </div>
            </div>

            <!-- Tombol Save -->
            <div class="ml-auto">
                <button type="submit" class="btn btn-success">{{ __('Posting') }}</button>
            </div>
        </div>
    </form>

    @push('scripts')
    <!-- Summernote -->
    <script src="{{ asset('assets/plugins/summernote/summernote-bs5.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const title = document.querySelector('#title');
            const slug = document.querySelector('#slug');
    
            title.addEventListener('change', function () {
                fetch('/berita/checkSlug?title=' + encodeURIComponent(title.value))
                    .then(response => response.json())
                    .then(data => {
                        slug.value = data.slug;
                    })
                    .catch(error => {
                        console.error('Error fetching slug:', error);
                    });
            });
    
            const imageInput = document.querySelector('#image');
            const imagePreview = document.querySelector('#image-preview');
    
            imageInput.addEventListener('change', function () {
                const reader = new FileReader();
                
                reader.onload = (e) => {
                    imagePreview.src = e.target.result;
                };
                
                reader.readAsDataURL(this.files[0]); 
            });
    
            // Inisialisasi Summernote
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