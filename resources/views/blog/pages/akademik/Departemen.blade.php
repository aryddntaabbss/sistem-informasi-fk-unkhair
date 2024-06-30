@extends('blog.layouts.main')
@include('blog.partials.navbar')

@section('body')
<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
    <div class="container-fluid" data-aos="fade-up">

        <section class="section-page sc-about--menu my-7">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                        <li class="breadcrumb-item">Akademik</li>
                        <li class="breadcrumb-item"><a href="/departemen">Departemen</a></li>
                    </ol>
                </nav>
        
                <div class="row mt-6">
                    <div class="col-md-10 mx-auto">
                        <div class="card shadow-lg">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                                <div class="bg-gradient-info shadow-dark border-radius-lg p-4">
                                    <h3 class="text-white mb-0" style="font-size: 2rem;">Departemen</h3>
                                </div>
                            </div>
                            <section class="py-lg-5">
                                <div class="container">
                                    <div class="row my-5">
                                        <div class="col-md-10 mx-auto text-center">
                                            <h2 class="text-info" style="font-size: 1.5rem;">Departemen di Fakultas Teknik Universitas Khairun</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mx-auto" style="font-size: 1rem;">
                                            @if($data->body != null)
                                            <p>{!! $data->body !!}</p>
                                            @else
                                            <div class="text text-center dark my-3">
                                                <h4>Not Found!</h4>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        

    </div>
</section>

@include('blog.partials.footer')
@endsection