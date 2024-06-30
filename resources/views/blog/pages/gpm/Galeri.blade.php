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
                                    <li class="breadcrumb-item">GPM-PR</li>
                                    <li class="breadcrumb-item"><a href="/galeri">Galeri</a></li>
                                </ol>
                            </nav>
                        </div>

                        <section class="pt-md-2 pb-md-5 pt-lg-5 mt-3 mt-md-4 mt-lg-0">
                            <div class="container">
                                <div class="col-12 mx-auto pb-5">
                                    <div class="card shadow-lg">
                                        <div
                                            class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                                            <div class="bg-gradient-info shadow-dark border-radius-lg p-4">
                                                <h3 class="text-white mb-0">Galeri</h3>
                                            </div>
                                        </div>
                                        <div
                                            class="card-body p-2 p-sm-3 p-md-4 p-lg-5 pt-0 my-2 my-sm-3 my-md-4 my-lg-5">
                                            @if(isset($data) && count($data) > 0)
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    @foreach($data as $index => $p)
                                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                        <div
                                                            class="page-header border-radius-md aspect-ratio-container">
                                                            <img class="img-fluid aspect-ratio-content"
                                                                src="{{ asset('storage/'.$p->image_path) }}"
                                                                alt="Background Image">
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                {{-- Carousel Button --}}
                                                @if (count($data) > 1)
                                                <a class="carousel-control-prev" href="#carouselExampleControls"
                                                    role="button" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleControls"
                                                    role="button" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </a>
                                                @endif
                                            </div>
                                            @else
                                            <div class="text text-center dark mt-6">
                                                <h4>Not Found!</h4>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>

    </div>
</section>

@include('blog.partials.footer')
@endsection