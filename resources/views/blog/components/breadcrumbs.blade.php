<div class="container py-3">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>

                @if(Request::is('/sambutan-dekan'))
                <li class="breadcrumb-item active" aria-current="page">Sambutan Dekan</li>
                @else
                <li class="breadcrumb-item"><a href="/sambutan-dekan">Sambutan Dekan</a></li>
                @endif

                @if(Request::is('/berita'))
                <li class="breadcrumb-item active" aria-current="page">Berita</li>
                @else
                <li class="breadcrumb-item"><a href="/berita">Berita</a></li>
                @endif

                @if(Request::is('/peta-fakultas'))
                <li class="breadcrumb-item active" aria-current="page">Peta Fakultas</li>
                @else
                <li class="breadcrumb-item"><a href="/peta-fakultas">Peta Fakultas</a></li>
                @endif

                <!-- Lanjutkan untuk setiap halaman yang Anda miliki -->

            </ol>
        </nav>
    </div>
</div>