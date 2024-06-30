<?php

namespace Database\Seeders;

use App\Models\Akademik;
use App\Models\User;
use App\Models\Profil;
use App\Models\Berita;
use App\Models\GPM;
use App\Models\KekayaanIntelektual;
use App\Models\Kemahasiswaan;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin1234')
        ]);

        // PROFIL FATEK
        Profil::create([
            'title' => 'sejarah'
        ]);
        Profil::create([
            'title' => 'visi-misi'
        ]);
        Profil::create([
            'title' => 'struktur'
        ]);
        Profil::create([
            'title' => 'manajemen'
        ]);
        Profil::create([
            'title' => 'master-plan'
        ]);
        Profil::create([
            'title' => 'video'
        ]);

        // AKADEMIK
        Akademik::create([
            'title' => 'departemen'
        ]);
        Akademik::create([
            'title' => 'magister'
        ]);
        Akademik::create([
            'title' => 'doktor'
        ]);
        Akademik::create([
            'title' => 'profesi'
        ]);
        Akademik::create([
            'title' => 'kalender'
        ]);

        // KEMAHASISWAAN
        Kemahasiswaan::create([
            'title' => 'asrama'
        ]);
        Kemahasiswaan::create([
            'title' => 'pengembangan_karakter'
        ]);
        Kemahasiswaan::create([
            'title' => 'peningkatan_prestasi'
        ]);
        Kemahasiswaan::create([
            'title' => 'alumni'
        ]);
        Kemahasiswaan::create([
            'title' => 'aturan'
        ]);

        KekayaanIntelektual::create([
            'title' => 'hak_kekayaan_intelektual'
        ]);

        GPM::create([
            'title' => 'Profil GPM-PR'
        ]);
        GPM::create([
            'title' => 'Dokumen Mutu'
        ]);
        GPM::create([
            'title' => 'Audit Mutu Akademik Internal'
        ]);
        GPM::create([
            'title' => 'Lam Teknik'
        ]);
        GPM::create([
            'title' => 'Laporan Kepuasan Pengguna'
        ]);
        GPM::create([
            'title' => 'Survei Kepuasan Layanan Mahasiswa'
        ]);
    }
}
