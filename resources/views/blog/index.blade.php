@extends('blog.layouts.main')
@include('blog.partials.navbar')

@include('blog.partials.hero')

@section('body')
<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
  <div class="container-fluid" data-aos="fade-up">

    <div class="row">

      {{-- Section Visi Misi --}}
      <section class="py-6 position-relative mt-5">
        <div class="col-lg-6">
          <h2 class="mb-7 px-5 text-info">Visi, Misi, & Sasaran</h2>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class=" bg-gradient-dark">
              <div class="row py-5">
                <div class="col-xl-4 col-md-6 px-5 position-relative">
                  <img class="img max-width-300 w-100 position-relative z-index-2 mt-n7"
                    src="{{ asset('assets/img/image-1.png') }}" loading="lazy" alt="card image">
                </div>
                <div class="col-xl-7 col-md-5 z-index-2 position-relative px-md-3 px-5 my-md-auto mt-4">
                  <i class="material-icons text-light text-5xl">format_quote</i>
                  <p class="text-lg text-light">
                    Jelajahi Visi dan Misi Fakultas Teknik kami untuk memahami arah dan komitmen kami. Temukan visi kami
                    yang memimpin langkah kami ke arah masa depan yang inovatif dan eksplorasi misi kami yang menegaskan
                    peran kami dalam menginspirasi generasi masa depan teknik.
                  </p>
                  <hr class="vertical start-100 ms-n5 d-xl-block d-none">
                  <div class="button">
                    <a href="/visi-misi-dan-sasaran">
                      <button type="button" class="btn bg-gradient-info btn-sm mb-0 mt-3">Read
                        More</button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {{-- Section Riset --}}
      <section class="my-3">
        <div class="card shadow-lg mt-n5 mx-4 mb-4">
          <div class="card-body">
            <div class="container-fluid px-0">
              <div class="row">
                <div class="col-lg-4 col-sm-6 mb-sm-0 mb-4">
                  <div class="info-horizontal border-radius-xl p-4 d-block d-md-flex ">
                    <i class="material-icons text-3xl text-gradient text-info">science</i>
                    <div class="description ps-0 ps-md-3">
                      <h5>Daftar Penelitian</h5>
                      <p>Penelitian inovatif terbaru untuk perkembangan teknologi.</p>
                      <a href="/daftar-penelitian-lbe" class="text-dark icon-move-right">
                        Read More
                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-6 px-lg-1">
                  <div class="info-horizontal border-radius-xl p-4 d-block d-md-flex ">
                    <i class="material-icons text-3xl text-gradient text-info">biotech</i>
                    <div class="description ps-0 ps-md-3">
                      <h5>Hasil Inovasi</h5>
                      <p>Hasil inovasi terbaru untuk keunggulan dalam teknologi.</p>
                      <a href="/hasil-inovasi" class="text-dark icon-move-right">
                        Read More
                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 mt-lg-0 mt-4">
                  <div class="info-horizontal bg-gradient-info border-radius-xl p-4 d-block d-md-flex ">
                    <i class="material-icons text-3xl text-white">psychology</i>
                    <div class="description ps-0 ps-md-3">
                      <h5 class="text-white">Hak Kekayaan Intelektual</h5>
                      <p class="text-white">Perlindungan hak kekayaan intelektual untuk penelitian teknologi.</p>
                      <a href="/hak-kekayaan-intelektual" class="text-white icon-move-right">
                        Read More
                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {{-- Section Departemen & Akreditasi --}}
      <section>
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="container">
                <div class="row">
                  <div class="col-lg-6 justify-content-center d-flex flex-column pl-lg-5 pt-lg-0 pt-3"
                    data-aos="fade-right">
                    <h2 class="category text-info mt-3"><a href="/departemen" class="text-dark">Departemen</a></h2>
                    <p class="card-description">
                      Temukan lebih lanjut tentang Departemen kami. Pelajari lebih lanjut tentang spesialisasi dan
                      kontribusi unik dari setiap departemen di Fakultas Teknik kami. <a href="/departemen"
                        class="text-darker icon-move-right text-sm">Read
                        More
                        <i class="fas fa-arrow-right text-xs ms-1" aria-hidden="true"></i>
                      </a>
                    </p>
                  </div>
                  <div class="col-lg-6 justify-content-center d-flex flex-column" data-aos="fade-left">
                    <div class="card">
                      <div class="d-block blur-shadow-image">
                        <img src="{{ asset('assets/img/image-3.jpg') }}" alt="img-blur-shadow-blog-2"
                          class="img-fluid border-radius-lg" loading="lazy">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="container">
                <div class="row mt-5">
                  <div class="col-lg-6 justify-content-center d-flex flex-column">
                    <div class="card">
                      <div class="d-block blur-shadow-image">
                        <img src="{{ asset('assets/img/image-1.png') }}" alt="img-blur-shadow-blog-2"
                          class="img-fluid border-radius-xl" loading="lazy">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 justify-content-center d-flex flex-column pl-lg-5 pt-lg-0 pt-3">
                    <h2 class="category text-info mt-3"><a href="/akreditasi" class="text-dark">Akreditasi</a></h2>
                    <p class="card-description">
                      Jelajahi standar kualitas kami dengan mengeksplorasi informasi tentang akreditasi. Temukan
                      pengakuan resmi dari badan akreditasi yang menjamin standar pendidikan kami. <a href="/akreditasi"
                        class="text-darker icon-move-right text-sm">Read
                        More
                        <i class="fas fa-arrow-right text-xs ms-1" aria-hidden="true"></i>
                      </a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {{-- Section Berita --}}
      @if (isset($berita) && count($berita) > 2)
      <section class="py-6">
        <div class="container">
          <div class="row">
            <div class="col-9 text-center mx-auto" data-aos="fade-up">
              <h2 class="mb-6 text-info">Berita Terbaru</h2>
            </div>
            @foreach ($berita as $b)
            <div class="col-lg-4 mb-lg-0 mb-4">
              <div class="card">
                <div class="card-header p-0 mx-3 mt-n4 position-relative z-index-1">
                  <a href="{{ route('blog.detail-berita', $b->slug) }}" class="d-block blur-shadow-image">
                    <img src="{{ asset('Storage/'.$b->image_path) }}" class="img-fluid border-radius-md" alt="anastasia"
                      loading="lazy">
                  </a>
                </div>
                <div class="card-body">
                  <a href="{{ route('blog.detail-berita', $b->slug) }}" class="card-title mt-3 h5 d-block text-darker">
                    {{ $b->title }}
                  </a>
                  <p class="card-description mb-2">
                    {{ $b->excerpt }}
                  </p>
                  <div class="author align-items-center">
                    <div class="stats">
                      <small>{{ $b->created_at->format('d M Y') }}</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
      @endif

      {{-- Section Angka --}}
      <section class="pt-3 pb-4" id="count-stats">
        <div class=" bg-gradient-dark">
          <div class="container">
            <div class="row">
              <div class="mx-auto py-3">
                <div class="row">
                  <div class="col-md-3 position-relative">
                    <div class="p-3 text-center">
                      <h1 class="text-gradient text-info"><span id="state1" countto="8">8</span></h1>
                      <h5 class="mt-3 text-light">Program Studi</h5>
                    </div>
                    <hr class="vertical light">
                  </div>
                  <div class="col-md-3 position-relative">
                    <div class="p-3 text-center">
                      <h1 class="text-gradient text-info"><span id="state2" countto="{{ $guru }}">{{ $guru }}</span>
                      </h1>
                      <h5 class="mt-3 text-light">Guru Besar</h5>
                    </div>
                    <hr class="vertical light">
                  </div>
                  <div class="col-md-3 position-relative">
                    <div class="p-3 text-center">
                      <h1 class="text-gradient text-info"><span id="state2" countto="{{ $dosen }}">{{ $dosen }}</span>
                      </h1>
                      <h5 class="mt-3 text-light">Dosen</h5>
                    </div>
                    <hr class="vertical light">
                  </div>
                  <div class="col-md-3">
                    <div class="p-3 text-center">
                      <h1 class="text-gradient text-info"><span id="state3" countto="{{ $pendidik }}">{{ $pendidik
                          }}</span></h1>
                      <h5 class="mt-3 text-light">Tenaga Kependidikan</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</section>

@include('blog.partials.footer')
@endsection