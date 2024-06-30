<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Akademik;
use App\Models\Akreditasi;
use App\Models\Berita;
use App\Models\Dosen;
use App\Models\Galeri;
use App\Models\GPM;
use App\Models\GuruBesar;
use App\Models\Inovasi;
use App\Models\KekayaanIntelektual;
use App\Models\Kemahasiswaan;
use App\Models\KerjasamaDN;
use App\Models\KerjasamaLN;
use App\Models\Penelitian;
use App\Models\Pengabdian;
use App\Models\Profil;
use App\Models\TenagaPendidik;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    // BERANDA
    public function index()
    {
        $guru = GuruBesar::all()->count();
        if ($guru == null) {
            $guru = 0;
        }

        $dosen = Dosen::all()->count();
        if ($dosen == null) {
            $dosen = 0;
        }

        $pendidik = TenagaPendidik::all()->count();
        if ($pendidik == null) {
            $pendidik = 0;
        }

        $berita = Berita::orderBy('created_at', 'desc')->take(3)->get();

        $video = Profil::findOrFail(6);
        // $video->image_path = '';
        return view('blog.index')->with(compact('guru', 'pendidik', 'berita', 'video', 'dosen'));
    }

    // BERITA
    public function berita()
    {
        $data = Berita::orderBy('created_at', 'desc');

        $panels = $data->take(3)->get();

        $berita = $data->skip(3)->paginate(10);

        // dd($panels);
        return view('blog.pages.profile.Berita')->with(compact('berita', 'panels'));
    }
    public function detailBerita($slug)
    {
        $post = Berita::where('slug', $slug)->firstOrFail();

        $post->view = $post->view + 1;
        $post->save();

        return view('blog.components.detail-berita', [
            'post' => $post
        ]);
    }

    // PROFIL
    public function sejarah()
    {
        $data = Profil::findOrFail(1);
        return view('blog.pages.profile.Sejarah-Singkat')->with(compact('data'));
    }
    public function visiMisi()
    {
        $data = Profil::findOrFail(2);
        return view('blog.pages.profile.Visi-Misi-Sasaran')->with(compact('data'));
    }
    public function struktur()
    {
        $data = Profil::findOrFail(3);
        return view('blog.pages.profile.Struktur-Organisasi')->with(compact('data'));
    }
    public function manajemen()
    {
        $data = Profil::findOrFail(4);
        return view('blog.pages.profile.Manajemen')->with(compact('data'));
    }
    public function masterPlan()
    {
        $data = Profil::findOrFail(5);
        return view('blog.pages.profile.Master-Plan')->with(compact('data'));
    }


    // AKADEMIK
    public function departemen()
    {
        $data = Akademik::findOrFail(1);
        return view('blog.pages.akademik.Departemen')->with(compact('data'));
    }
    public function magister()
    {
        $data = Akademik::findOrFail(2);
        return view('blog.pages.akademik.Program-Magister')->with(compact('data'));
    }
    public function doktor()
    {
        $data = Akademik::findOrFail(3);
        return view('blog.pages.akademik.Program-Doktor')->with(compact('data'));
    }
    public function profesi()
    {
        $data = Akademik::findOrFail(4);
        return view('blog.pages.akademik.Program-Profesi')->with(compact('data'));
    }
    public function kalender()
    {
        $data = Akademik::findOrFail(5);
        return view('blog.pages.akademik.Kalender-Akademik')->with(compact('data'));
    }
    public function akreditasi()
    {
        $data = Akreditasi::all();
        return view('blog.pages.akademik.Akreditasi')->with(compact('data'));
    }

    // SUMBERDAYA
    public function guruBesar()
    {
        $data = GuruBesar::all();
        return view('blog.pages.sumber_daya.Guru-Besar')->with(compact('data'));
    }
    public function dosen()
    {
        $data = Dosen::all();
        return view('blog.pages.sumber_daya.Dosen')->with(compact('data'));
    }
    public function tenagaPendidik()
    {
        $data = TenagaPendidik::all();
        return view('blog.pages.sumber_daya.Tenaga-Kependidikan')->with(compact('data'));
    }

    // KEMAHASISWAAN
    public function asrama()
    {
        $data = Kemahasiswaan::findOrFail(1);
        return view('blog.pages.kemahasiswaan.Asrama')->with(compact('data'));
    }
    public function pengembanganKarakter()
    {
        $data = Kemahasiswaan::findOrFail(2);
        return view('blog.pages.kemahasiswaan.Pengembangan-Karakter-MHS')->with(compact('data'));
    }
    public function peningkatanPrestasi()
    {
        $data = Kemahasiswaan::findOrFail(3);
        return view('blog.pages.kemahasiswaan.Peningkatan-Prestasi-MHS')->with(compact('data'));
    }
    public function alumni()
    {
        $data = Kemahasiswaan::findOrFail(4);
        return view('blog.pages.kemahasiswaan.Alumni')->with(compact('data'));
    }
    public function aturan()
    {
        $data = Kemahasiswaan::findOrFail(5);
        return view('blog.pages.kemahasiswaan.Aturan-Kemahasiswaan')->with(compact('data'));
    }

    // RISET & INOVASI
    public function daftarPenelitian()
    {
        $data = Penelitian::all();
        return view('blog.pages.riset_inovasi.Daftar-Penelitian-LBE')->with(compact('data'));
    }
    public function daftarPengabdian()
    {
        $data = Pengabdian::all();
        return view('blog.pages.riset_inovasi.Daftar-Pengabdian')->with(compact('data'));
    }
    public function hasilInovasi()
    {
        $data = Inovasi::all();
        return view('blog.pages.riset_inovasi.Hasil-Inovasi')->with(compact('data'));
    }
    public function kekayaanIntelektual()
    {
        $data = KekayaanIntelektual::findOrFail(1);
        return view('blog.pages.riset_inovasi.Hak-Kekayaan-Intelektual')->with(compact('data'));
    }

    // KEMITRAAN
    public function kerjasamaDN()
    {
        $data = KerjasamaDN::all();
        return view('blog.pages.kemitraan.Kerjasama-Dalam-Negeri')->with(compact('data'));
    }
    public function kerjasamaLN()
    {
        $data = KerjasamaLN::all();
        return view('blog.pages.kemitraan.Kerjasama-Luar-Negeri')->with(compact('data'));
    }

    // GPM-PR
    public function profilGPM()
    {
        $data = GPM::findOrFail(1);
        return view('blog.pages.gpm.Profil-GPM')->with(compact('data'));
    }
    public function dokumenMutu()
    {
        $data = GPM::findOrFail(2);
        return view('blog.pages.gpm.Dokumen-Mutu')->with(compact('data'));
    }
    public function auditMutu()
    {
        $data = GPM::findOrFail(3);
        return view('blog.pages.gpm.Audit-Mutu')->with(compact('data'));
    }
    public function lamTeknik()
    {
        $data = GPM::findOrFail(4);
        return view('blog.pages.gpm.Lam-Teknik')->with(compact('data'));
    }
    public function laporanKepuasan()
    {
        $data = GPM::findOrFail(5);
        return view('blog.pages.gpm.Laporan-Kepuasan')->with(compact('data'));
    }
    public function surveiKepuasan()
    {
        $data = GPM::findOrFail(6);
        return view('blog.pages.gpm.Survei-Kepuasan')->with(compact('data'));
    }
    public function galeri()
    {
        $data = Galeri::all();
        return view('blog.pages.gpm.Galeri')->with(compact('data'));
    }
}
