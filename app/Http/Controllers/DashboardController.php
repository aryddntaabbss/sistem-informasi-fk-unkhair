<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Akreditasi;
use App\Models\Berita;
use App\Models\GuruBesar;
use App\Models\Profil;
use App\Models\TenagaPendidik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $guru = GuruBesar::all()->count();
        if ($guru == null) {
            $guru = 0;
        }

        $pendidik = TenagaPendidik::all()->count();
        if ($pendidik == null) {
            $pendidik = 0;
        }

        $berita = Berita::all()->count();
        if ($berita == null) {
            $berita = 0;
        }

        $akreditasi = Akreditasi::all()->count();
        if ($akreditasi == null) {
            $akreditasi = 0;
        }

        $video = Profil::findOrFail(6);

        return view('dashboard.index')->with(compact('guru', 'pendidik', 'berita', 'akreditasi', 'video'));
    }

    public function storeVideo(Request $request)
    {
        $data = Profil::findOrFail(6);
        // Validasi input dari form
        $validatedData = $request->validate([
            'image_path' => 'required|mimes:mp4,avi,mov,wmv|max:46080',
        ]);

        try {
            if ($request->hasFile('image_path')) {
                if ($data->image_path) {
                    Storage::delete('public/' . $data->image_path);
                }

                $uniqueFileName = $request->file('image_path')->hashName();
                $request->file('image_path')->storeAs('public/VideoProfil', $uniqueFileName);
                $validatedData['image_path'] = 'VideoProfil/' . $uniqueFileName;
            }

            $data->update($validatedData);

            toastr()->success('Data telah berhasil diubah.');
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('dashboard')->with('message', $e->getMessage());
        }
    }
}
