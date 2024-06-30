<header>
  @if ($video->image_path != '')
  <div class="page-header min-vh-100 position-relative">
    <span class="mask bg-gradient-dark opacity-5"></span>
    <div class="container-fluid position-absolute top-0 start-0 end-0 bottom-0">
      <video autoplay muted loop playsinline
        style="width: 100%; max-height: 100vh; object-fit: cover;">
        <source src="{{ asset('storage/' . $video->image_path) }}" type="video/mp4">
        Your browser does not support the video tag.
      </video>
    </div>
  </div>
  @else
  <div class="page-header min-vh-100" style="background-image: url('{{ asset('assets/img/image-2.jpg') }}');"
    loading="lazy">
    <span class="mask bg-gradient-dark opacity-5"></span>
    <div class="container">
      <div class="row">
      </div>
    </div>
  </div>
  @endif
</header>