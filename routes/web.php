<?php

use App\Http\Controllers\AkademikController;
use App\Http\Controllers\AkreditasiController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GPMController;
use App\Http\Controllers\GuruBesarController;
use App\Http\Controllers\InovasiController;
use App\Http\Controllers\KekayaanIntelektualController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KelolaUserController;
use App\Http\Controllers\KemahasiswaanController;
use App\Http\Controllers\KerjasamaDNController;
use App\Http\Controllers\KerjasamaLNController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\PengabdianController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TenagaPendidikController;
use Illuminate\Support\Facades\Route;

Route::get('/storage-link', function () {
    $targetFolder = base_path() . '/storage/app/public';
    $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
    symlink($targetFolder, $linkFolder);
});

// BLOG PAGES
Route::prefix('/')->group(function () {
    // BERANDA
    Route::get('/', [PagesController::class, 'index']);

    // PROFIL
    Route::get('/berita', [PagesController::class, 'berita']);
    Route::get('/berita/{slug}', [PagesController::class, 'detailBerita'])->name('blog.detail-berita');

    Route::get('/sejarah-singkat', [PagesController::class, 'sejarah']);
    Route::get('/visi-misi-dan-sasaran', [PagesController::class, 'visiMisi']);
    Route::get('/struktur-organisasi', [PagesController::class, 'struktur']);
    Route::get('/manajemen', [PagesController::class, 'manajemen']);
    Route::get('/master-plan', [PagesController::class, 'masterPlan']);
    Route::get('/peta-fakultas', function () {
        return view('blog.pages.profile.Peta-Fakultas');
    });

    // AKADEMIK
    Route::get('/departemen', [PagesController::class, 'departemen']);
    Route::get('/program-magister', [PagesController::class, 'magister']);
    Route::get('/program-doktor', [PagesController::class, 'doktor']);
    Route::get('/program-profesi', [PagesController::class, 'profesi']);
    Route::get('/kalender-akademik', [PagesController::class, 'kalender']);
    Route::get('/akreditasi', [PagesController::class, 'akreditasi']);
    Route::get('/akreditasi/view/pdf', [AkreditasiController::class, 'downloadPdf']);


    // SUMBERDAYA
    Route::get('/guru-besar', [PagesController::class, 'guruBesar']);
    Route::get('/dosen', [PagesController::class, 'dosen']);
    Route::get('/tenaga-kependidikan', [PagesController::class, 'tenagaPendidik']);

    // KEMAHASISWAAN
    Route::get('/asrama', [PagesController::class, 'asrama']);
    Route::get('/pengembangan-karakter-mahasiswa', [PagesController::class, 'pengembanganKarakter']);
    Route::get('/peningkatan-prestasi-mahasiswa', [PagesController::class, 'peningkatanPrestasi']);
    Route::get('/alumni', [PagesController::class, 'alumni']);
    Route::get('/aturan-kemahasiswaan', [PagesController::class, 'aturan']);

    //  RISET & INOVASI
    Route::get('/daftar-penelitian-lbe', [PagesController::class, 'daftarPenelitian']);
    Route::get('/daftar-pengabdian', [PagesController::class, 'daftarPengabdian']);
    Route::get('/hasil-inovasi', [PagesController::class, 'hasilInovasi']);
    Route::get('/hak-kekayaan-intelektual', [PagesController::class, 'kekayaanIntelektual']);

    // KEMITRAAN
    Route::get('/kerjasama-dalam-negeri', [PagesController::class, 'kerjasamaDN']);
    Route::get('/kerjasama-luar-negeri', [PagesController::class, 'kerjasamaLN']);

    // GPM-PR & Galeri
    Route::get('/profil-gpm-pr', [PagesController::class, 'profilGPM']);
    Route::get('/dokumen-mutu', [PagesController::class, 'dokumenMutu']);
    Route::get('/audit-mutu', [PagesController::class, 'auditMutu']);
    Route::get('/lam-teknik', [PagesController::class, 'lamTeknik']);
    Route::get('/laporan-kepuasan-pengguna', [PagesController::class, 'laporanKepuasan']);
    Route::get('/survei-kepuasan-layanan', [PagesController::class, 'surveiKepuasan']);
    Route::get('/galeri', [PagesController::class, 'galeri']);
});

Route::fallback(function () {
    return view('blog.notfound');
});
Route::get('/understructure', function () {
    return view('blog.understructure');
});
// Check Slug
Route::get('/berita/checkSlug', [BeritaController::class, 'checkSlug']);

// DASHBOARD
Route::prefix('/dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::put('/', [DashboardController::class, 'storeVideo'])->name('store-video-profil');

    Route::prefix('/profil')->group(function () {
        // BERITA
        Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
        Route::get('/berita/tambah', [BeritaController::class, 'create'])->name('tambah-berita');
        Route::post('/berita/tambah', [BeritaController::class, 'store'])->name('store-berita');
        Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('detail-berita');
        Route::get('/berita/{slug}/edit', [BeritaController::class, 'edit'])->name('edit-berita');
        Route::put('/berita/{slug}', [BeritaController::class, 'update'])->name('update-berita');
        Route::delete('/berita/{slug}', [BeritaController::class, 'destroy'])->name('delete-berita');

        // SEJARAH SINGKAT
        Route::get('/sejarah', [ProfilController::class, 'sejarah'])->name('sejarah');
        Route::get('/sejarah/edit', [ProfilController::class, 'editSejarah'])->name('edit-sejarah');
        Route::put('/sejarah', [ProfilController::class, 'updateSejarah'])->name('update-sejarah');

        // VISI, MISI & SASARAN
        Route::get('/visi-misi', [ProfilController::class, 'visimisi'])->name('visi-misi');
        Route::get('/visi-misi/edit', [ProfilController::class, 'editVisiMisi'])->name('edit-visi-misi');
        Route::put('/visi-misi', [ProfilController::class, 'updateVisiMisi'])->name('update-visi-misi');

        // STRUKTUR ORGANISASI
        Route::get('/struktur-organisasi', [ProfilController::class, 'struktur'])->name('struktur');
        Route::get('/struktur-organisasi/edit', [ProfilController::class, 'editStruktur'])->name('edit-struktur');
        Route::put('/struktur-organisasi', [ProfilController::class, 'updateStruktur'])->name('update-struktur');

        // MANAJEMEN
        Route::get('/manajemen', [ProfilController::class, 'manajemen'])->name('manajemen');
        Route::get('/manajemen/edit', [ProfilController::class, 'editManajemen'])->name('edit-manajemen');
        Route::put('/manajemen', [ProfilController::class, 'updateManajemen'])->name('update-manajemen');

        // MASTER PLAN
        Route::get('/master-plan', [ProfilController::class, 'masterPlan'])->name('master-plan');
        Route::put('/master-plan', [ProfilController::class, 'updateMasterPlan'])->name('update-master-plan');
        Route::put('/clear-master-plan', [ProfilController::class, 'clearMasterPlan'])->name('clear-master-plan');
    });

    Route::prefix('/akademik')->group(function () {

        // DEPARTEMEN
        Route::get('/departemen', [AkademikController::class, 'departemen'])->name('departemen');
        Route::get('/departemen/edit', [AkademikController::class, 'editDepartemen'])->name('edit-departemen');
        Route::put('/departemen', [AkademikController::class, 'updateDepartemen'])->name('update-departemen');

        // PROGRAM MAGISTER
        Route::get('/program-magister', [AkademikController::class, 'magister'])->name('magister');
        Route::get('/program-magister/edit', [AkademikController::class, 'editMagister'])->name('edit-magister');
        Route::put('/program-magister', [AkademikController::class, 'updateMagister'])->name('update-magister');

        // PROGRAM DOKTOR
        Route::get('/program-doktor', [AkademikController::class, 'doktor'])->name('doktor');
        Route::get('/program-doktor/edit', [AkademikController::class, 'editDoktor'])->name('edit-doktor');
        Route::put('/program-doktor', [AkademikController::class, 'updateDoktor'])->name('update-doktor');

        // PROGRAM DOKTOR
        Route::get('/program-profesi', [AkademikController::class, 'profesi'])->name('profesi');
        Route::get('/program-profesi/edit', [AkademikController::class, 'editProfesi'])->name('edit-profesi');
        Route::put('/program-profesi', [AkademikController::class, 'updateProfesi'])->name('update-profesi');

        //AKREDITASI
        Route::get('/akreditasi', [AkreditasiController::class, 'index'])->name('akreditasi');
        Route::post('/akreditasi', [AkreditasiController::class, 'store'])->name('store-akreditasi');
        Route::delete('/akreditasi/{id}', [AkreditasiController::class, 'destroy'])->name('delete-akreditasi');
        Route::put('/akreditasi/{id}', [AkreditasiController::class, 'update'])->name('update-akreditasi');

        // PROGRAM KALENDER
        Route::get('/program-kalender', [AkademikController::class, 'kalender'])->name('kalender');
        Route::get('/program-kalender/edit', [AkademikController::class, 'editkalender'])->name('edit-kalender');
        Route::put('/program-kalender', [AkademikController::class, 'updateKalender'])->name('update-kalender');
    });

    Route::prefix('/sumber-daya')->group(function () {

        // GURU BESAR
        Route::get('/guru-besar', [GuruBesarController::class, 'index'])->name('guru-besar');
        Route::post('/guru-besar', [GuruBesarController::class, 'store'])->name('store-guru-besar');
        Route::delete('/guru-besar/{id}', [GuruBesarController::class, 'destroy'])->name('delete-guru-besar');
        Route::put('/guru-besar/{id}', [GuruBesarController::class, 'update'])->name('update-guru-besar');

        // DOSEN
        Route::get('/dosen', [DosenController::class, 'index'])->name('dosen');
        Route::post('/dosen', [DosenController::class, 'store'])->name('store-dosen');
        Route::delete('/dosen/{id}', [DosenController::class, 'destroy'])->name('delete-dosen');
        Route::put('/dosen/{id}', [DosenController::class, 'update'])->name('update-dosen');

        // TENAGA KEPENDIDIKAN
        Route::get('/tenaga-kependidikan', [TenagaPendidikController::class, 'index'])->name('tenaga-kependidikan');
        Route::post('/tenaga-kependidikan', [TenagaPendidikController::class, 'store'])->name('store-tenaga-kependidikan');
        Route::delete('/tenaga-kependidikan/{id}', [TenagaPendidikController::class, 'destroy'])->name('delete-tenaga-kependidikan');
        Route::put('/tenaga-kependidikan/{id}', [TenagaPendidikController::class, 'update'])->name('update-tenaga-kependidikan');

        // SARANA & PRASARANA
    });

    Route::prefix('/kemahasiswaan')->group(function () {

        // UPT ASRAMA (ASRAMA TEKNIK)
        Route::get('/asrama', [KemahasiswaanController::class, 'asrama'])->name('asrama');
        Route::get('/asrama/edit', [KemahasiswaanController::class, 'editAsrama'])->name('edit-asrama');
        Route::put('/asrama', [KemahasiswaanController::class, 'updateAsrama'])->name('update-asrama');

        // PENGEMBANGAN KARAKTER MAHASISWA
        Route::get('/pengembangan-karakter', [KemahasiswaanController::class, 'pengembanganKarakter'])->name('pengembangan-karakter');
        Route::get('/pengembangan-karakter/edit', [KemahasiswaanController::class, 'editPengembanganKarakter'])->name('edit-pengembangan-karakter');
        Route::put('/pengembangan-karakter', [KemahasiswaanController::class, 'updatePengembanganKarakter'])->name('update-pengembangan-karakter');

        // PENGEMBANGAN KARAKTER MAHASISWA
        Route::get('/peningkatan-prestasi', [KemahasiswaanController::class, 'peningkatanPrestasi'])->name('peningkatan-prestasi');
        Route::get('/peningkatan-prestasi/edit', [KemahasiswaanController::class, 'editPeningkatanPrestasi'])->name('edit-peningkatan-prestasi');
        Route::put('/peningkatan-prestasi', [KemahasiswaanController::class, 'updatePeningkatanPrestasi'])->name('update-peningkatan-prestasi');

        // ALUMNI
        Route::get('/alumni', [KemahasiswaanController::class, 'alumni'])->name('alumni');
        Route::get('/alumni/edit', [KemahasiswaanController::class, 'editAlumni'])->name('edit-alumni');
        Route::put('/alumni', [KemahasiswaanController::class, 'updateAlumni'])->name('update-alumni');

        // ATURAN
        Route::get('/aturan', [KemahasiswaanController::class, 'aturan'])->name('aturan');
        Route::get('/aturan/edit', [KemahasiswaanController::class, 'editAturan'])->name('edit-aturan');
        Route::put('/aturan', [KemahasiswaanController::class, 'updateAturan'])->name('update-aturan');
    });

    Route::prefix('/riset-inovasi')->group(function () {

        // DAFTAR PENELITIAN
        Route::get('/daftar-penelitian', [PenelitianController::class, 'index'])->name('daftar-penelitian');
        Route::post('/daftar-penelitian', [PenelitianController::class, 'store'])->name('store-daftar-penelitian');
        Route::delete('/daftar-penelitian/{id}', [PenelitianController::class, 'destroy'])->name('delete-daftar-penelitian');
        Route::put('/daftar-penelitian/{id}', [PenelitianController::class, 'update'])->name('update-daftar-penelitian');

        // DAFTAR PENGABDIAN
        Route::get('/daftar-pengabdian', [PengabdianController::class, 'index'])->name('daftar-pengabdian');
        Route::post('/daftar-pengabdian', [PengabdianController::class, 'store'])->name('store-daftar-pengabdian');
        Route::delete('/daftar-pengabdian/{id}', [PengabdianController::class, 'destroy'])->name('delete-daftar-pengabdian');
        Route::put('/daftar-pengabdian/{id}', [PengabdianController::class, 'update'])->name('update-daftar-pengabdian');

        // HASIL INOVASI
        Route::get('/inovasi', [InovasiController::class, 'index'])->name('inovasi');
        Route::post('/inovasi', [InovasiController::class, 'store'])->name('store-inovasi');
        Route::delete('/inovasi/{id}', [InovasiController::class, 'destroy'])->name('delete-inovasi');
        Route::put('/inovasi/{id}', [InovasiController::class, 'update'])->name('update-inovasi');

        // HAK KEKAYAAN INTELEKTUAL
        Route::get('/hak-kekayaan-intelektual', [KekayaanIntelektualController::class, 'index'])->name('hak-kekayaan-intelektual');
        Route::get('/hak-kekayaan-intelektual/edit', [KekayaanIntelektualController::class, 'edit'])->name('edit-hak-kekayaan-intelektual');
        Route::put('/hak-kekayaan-intelektual', [KekayaanIntelektualController::class, 'update'])->name('update-hak-kekayaan-intelektual');
    });

    Route::prefix('/kemitraan')->group(function () {

        // KERJASAMA DALAM NEGERI
        Route::get('/kerjasama-dalam-negeri', [KerjasamaDNController::class, 'index'])->name('kerjasama-dalam-negeri');
        Route::post('/kerjasama-dalam-negeri', [KerjasamaDNController::class, 'store'])->name('store-kerjasama-dn');
        Route::delete('/kerjasama-dalam-negeri/{id}', [KerjasamaDNController::class, 'destroy'])->name('delete-kerjasama-dn');
        Route::put('/kerjasama-dalam-negeri/{id}', [KerjasamaDNController::class, 'update'])->name('update-kerjasama-dn');

        // KERJASAMA LUAR NEGERI
        Route::get('/kerjasama-luar-negeri', [KerjasamaLNController::class, 'index'])->name('kerjasama-luar-negeri');
        Route::post('/kerjasama-luar-negeri', [KerjasamaLNController::class, 'store'])->name('store-kerjasama-ln');
        Route::delete('/kerjasama-luar-negeri/{id}', [KerjasamaLNController::class, 'destroy'])->name('delete-kerjasama-ln');
        Route::put('/kerjasama-luar-negeri/{id}', [KerjasamaLNController::class, 'update'])->name('update-kerjasama-ln');
    });

    Route::prefix('/gpm-pr')->group(function () {
        // PROFIL GPM-PR
        Route::get('/', [GPMController::class, 'index'])->name('gpm-pr');
        Route::get('/{id}/edit', [GPMController::class, 'edit'])->name('edit-gpm-pr');
        Route::put('/{id}', [GPMController::class, 'update'])->name('update-gpm-pr');
        Route::get('/{id}', [GPMController::class, 'show'])->name('show-gpm-pr');
        Route::put('/{id}/clear', [GPMController::class, 'destroy'])->name('delete-gpm-pr');
    });

    // GALERI
    Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
    Route::post('/galeri', [GaleriController::class, 'store'])->name('store-galeri');
    Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])->name('delete-galeri');

    // KELOLA PENGGUNA
    Route::get('/kelola-pengguna', [KelolaUserController::class, 'show'])->middleware(['IsAdmin'])->name('kelola-pengguna');

    // EDIT PROFIL
    Route::get('/edit-profil', [ProfileController::class, 'editProfil'])->name('edit-profil');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('update-profil');
});

require __DIR__ . '/auth.php';
