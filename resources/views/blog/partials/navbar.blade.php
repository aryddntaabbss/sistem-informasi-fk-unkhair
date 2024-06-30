<!-- Navbar -->
<div class="container position-sticky z-index-sticky top-0">
  <div class="row">
    <div class="col-12">
      <nav
        class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
        <div class="container">
          <a class="navbar-brand text-dark" href="/" rel="tooltip" data-placement="bottom" target="_blank">
            <img class="mx-auto" src="{{ asset('assets/img/favicon-32x32.png') }}" alt="">
            <span>Fakultas Teknik</span>
          </a>

          <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
              <span class="navbar-toggler-bar bar1"></span>
              <span class="navbar-toggler-bar bar2"></span>
              <span class="navbar-toggler-bar bar3"></span>
            </span>
          </button>
          <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">

            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link text-dark {{ Request::is('/') ? 'active' : '' }}" href="/">
                  Beranda
                </a>
              </li>

              {{-- Profil --}}
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  Profil
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/berita">Berita</a></li>
                  <li><a class="dropdown-item" href="/sejarah-singkat">Sejarah Singkat</a></li>
                  <li><a class="dropdown-item" href="/visi-misi-dan-sasaran">Visi, Misi dan Sasaran</a></li>
                  <li><a class="dropdown-item" href="/struktur-organisasi">Struktur Organisasi</a></li>
                  <li><a class="dropdown-item" href="/manajemen">Manajemen</a></li>
                  <li><a class="dropdown-item" href="/master-plan">Master Plan</a></li>
                  <li><a class="dropdown-item" href="/peta-fakultas">Peta Fakultas</a></li>
                </ul>
              </li>

              {{-- Akademik --}}
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  Akademik
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/departemen">Departemen</a></li>
                  <li><a class="dropdown-item" href="/program-magister">Program Magister</a></li>
                  <li><a class="dropdown-item" href="/program-doktor">Program Doktor</a></li>
                  <li><a class="dropdown-item" href="/program-profesi">Program Profesi</a></li>
                  <li><a class="dropdown-item" href="/akreditasi">Akreditasi</a></li>
                  <li><a class="dropdown-item" href="/kalender-akademik">Kalender Akademik</a></li>
                </ul>
              </li>

              {{-- Sumber Daya --}}
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  Sumber Daya
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/guru-besar">Guru Besar</a></li>
                  <li><a class="dropdown-item" href="/dosen">Dosen</a></li>
                  <li><a class="dropdown-item" href="/tenaga-kependidikan">Tenaga Kependidikan</a></li>
                </ul>
              </li>

              {{-- Kemahasiswaan --}}
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  Kemahasiswaan
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/asrama">UPT Asrama</a></li>
                  <li><a class="dropdown-item" href="/pengembangan-karakter-mahasiswa">Pengembangan Karakter
                      Mahasiswa</a></li>
                  <li><a class="dropdown-item" href="/peningkatan-prestasi-mahasiswa">Peningkatan Prestasi Mahasiswa</a>
                  </li>
                  <li><a class="dropdown-item" href="/alumni">Alumni</a></li>
                  <li><a class="dropdown-item" href="/aturan-kemahasiswaan">Aturan Kemahasiswaan</a></li>
                </ul>
              </li>

              {{-- Riset & Inovasi --}}
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  Riset dan Inovasi
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/daftar-penelitian-lbe">Daftar Penelitian LBE</a></li>
                  <li><a class="dropdown-item" href="/daftar-pengabdian">Daftar Pengabdian</a></li>
                  <li><a class="dropdown-item" href="/hasil-inovasi">Hasil Inovasi</a></li>
                  <li><a class="dropdown-item" href="/hak-kekayaan-intelektual">Hak Kekayaan Intelektual</a></li>
                </ul>
              </li>

              {{-- Kemitraan --}}
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  Kemitraan
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/kerjasama-dalam-negeri">Kerjasama Dalam Negeri</a></li>
                  <li><a class="dropdown-item" href="/kerjasama-luar-negeri">Kerjasama Luar Negeri</a></li>
                </ul>
              </li>

              {{-- GPM-PR & Galeri --}}
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  GPM-PR
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/profil-gpm-pr">Profile GPM-PR</a></li>
                  <li><a class="dropdown-item" href="/dokumen-mutu">Dokumen Mutu</a></li>
                  <li><a class="dropdown-item" href="/audit-mutu">Audit Mutu Akademik Internal</a></li>
                  <li><a class="dropdown-item" href="/lam-teknik">LAM Teknik</a></li>
                  <li><a class="dropdown-item" href="/laporan-kepuasan-pengguna">Laporan Kepuasan Pengguna</a></li>
                  <li><a class="dropdown-item" href="/survei-kepuasan-layanan">Survei Kepuasan Layanan Mahsiswa</a></li>
                  <li><a class="dropdown-item" href="/galeri">Galeri</a></li>
                </ul>
              </li>
            </ul>

            <!-- nav Social Media -->
            <ul class="nav navbar-nav">
              <li class="nav-item">
                <a class="nav-link text-dark" href="https://www.facebook.com/fakultas.teknik.100">
                  <i class="fab fa-facebook"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" href="https://www.instagram.com/fatekunkhair/">
                  <i class="fab fa-instagram"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
    </div>
  </div>
</div>