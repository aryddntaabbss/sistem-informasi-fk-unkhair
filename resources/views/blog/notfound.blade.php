@extends('blog.layouts.main')
@include('blog.partials.navbar')

@section('body')
<!-- ======= 404 Section ======= -->
<section>
    <div class="main container mt-7">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-3"></div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                <div class="main-img text-center">
                    <img src="{{ asset('assets/blog/img/main1.png') }}" alt="Main" class="img-fluid pb-3">

                    <h2>Page Not Found</h2>
                    <p class="main-description pt-2">We're sorry, the page you requested could not be found!</p>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-3"></div>
        </div>
    </div>
</section>
@endsection