@extends('blog.layouts.main')
@include('blog.partials.navbar')

@section('body')
<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
    <div class="container-fluid" data-aos="fade-up">

        <section class="section-page sc-about--menu my-7">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="container py-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                                    <li class="breadcrumb-item">Profil</li>
                                    <li class="breadcrumb-item"><a href="/berita">Berita</a></li>
                                </ol>
                            </nav>
                        </div>

                        @if (count($berita)>0)
                        <section>
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($panels as $index => $p)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <div class="page-header min-vh-75 border-radius-lg d-flex align-items-center"
                                            style="background-image: url('{{ asset('storage/'.$p->image_path) }}'); background-size: cover;">
                                            <span class="mask bg-gradient-dark"></span>
                                            <div class="container">
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-8 text-center">
                                                        <h1 class="text-white">{{ $p->title }}</h1>
                                                        <p class="lead text-white opacity-8">{{ $p->excerpt }}</p>
                                                        <a href="{{ route('blog.detail-berita', $p->slug) }}"
                                                            class="text-light icon-move-right">
                                                            Read More
                                                            <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                {{-- Carousel Button --}}
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </section>
                        
                        
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    {{-- List Berita-10 berita terbaru --}}
                                    <section class="py-5">
                                        {{-- Card Berita --}}
                                        @foreach ($berita as $b)
                                        <div class="card card-plain card-blog mt-3 mx-auto">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="card-image position-relative border-radius-lg">
                                                        <div class="blur-shadow-image">
                                                            <img class="img border-radius-lg img-fluid col-lg-12 col-md-10"
                                                                src="{{ asset('Storage/'.$b->image_path) }}"
                                                                alt="architecture" loading="lazy">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7 col-md-7 my-sm-auto mt-3 ms-sm-3">
                                                    <h4>
                                                        <a href="{{ route('blog.detail-berita', $b->slug) }}"
                                                            class="text-dark">{{ $b->title }}</a>
                                                    </h4>
                                                    <p class="text-justify">{{ $b->excerpt }}<a
                                                            href="{{ route('blog.detail-berita', $b->slug) }}"
                                                            class="text-info"> Read
                                                            More
                                                        </a>
                                                    </p>
                                                    <div class="author">
                                                        <p class="mb-0 text-body">{{ $b->created_at->format('d M Y') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="mt-5">
                                            {{ $berita->links('pagination::bootstrap-4') }}
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        @else
                        <section class="pt-md-2 pb-md-5 pt-lg-5 mt-3 mt-md-4 mt-lg-0">
                            <div class="container">
                                <div class="col-12 mx-auto pb-5">
                                    <div class="card shadow-lg">
                                        <div
                                            class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                                            <div class="bg-gradient-info shadow-dark border-radius-lg p-4">
                                                <h3 class="text-white mb-0">Berita</h3>
                                            </div>
                                        </div>
                                        <section class="py-lg-5">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-10 mx-auto">
                                                        <div class="text text-center dark mt-6">
                                                            <h2>Not Found!</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </section>
                        @endif
                    </div>
                </div>
            </div>
        </section>

    </div>
</section>

@include('blog.partials.footer')
@endsection