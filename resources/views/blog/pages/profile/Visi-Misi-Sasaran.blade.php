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
                                    <li class="breadcrumb-item"><a href="/visi-misi-dan-sasaran">Visi Misi Dan
                                            Sasaran</a></li>
                                </ol>
                            </nav>
                        </div>

                        <section class="pt-md-2 pb-md-5 pt-lg-5 mt-3 mt-md-4 mt-lg-0">
                            <div class="container my-5">
                                <div class="col-12 mx-auto pb-5">
                                    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6">

                                        <section class="py-lg-5">
                                            <div class="container">
                                                <div class="row my-5">
                                                    <div class="col-md-6 mx-auto text-center">
                                                        <h2 class="text-info">Visi, Misi dan Sasaran</h2>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-10 mx-auto">
                                                        @if($data->body != null)
                                                        <p>{!! $data->body !!}</p>
                                                        @else
                                                        <div class="text text-center dark mt-6">
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
                        </section>
                    </div>
                </div>
            </div>
        </section>

    </div>
</section>

@include('blog.partials.footer')
@endsection