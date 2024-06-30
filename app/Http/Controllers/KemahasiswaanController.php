<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kemahasiswaan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class KemahasiswaanController extends Controller
{
    // UPT ASRAMA (ASRAMA TEKNIK)
    public function asrama(): View
    {
        $data = Kemahasiswaan::findOrFail(1);

        return view('dashboard.kemahasiswaan.asrama.main-asrama')->with(compact('data'));
    }

    public function editAsrama(): View
    {
        $data = Kemahasiswaan::findOrFail(1);

        return view('dashboard.kemahasiswaan.asrama.edit-asrama')->with(compact('data'));
    }

    public function updateAsrama(Request $request)
    {
        $data = Kemahasiswaan::findOrFail(1);

        $validatedData = $request->validate([
            'body' => 'required',
        ]);

        try {
            // Update departemen
            $data->update($validatedData + ['updated_at' => now('Asia/Jayapura')]);

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil diubah.');
            return redirect()->route('asrama');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('asrama')->with('message', $e->getMessage());
        }
    }

    // PENGEMBANGAN KARAKTER MAHASISWA
    public function pengembanganKarakter(): View
    {
        $data = Kemahasiswaan::findOrFail(2);

        return view('dashboard.kemahasiswaan.pengembangan-karakter.main-pengembangan-karakter')->with(compact('data'));
    }

    public function editPengembanganKarakter(): View
    {
        $data = Kemahasiswaan::findOrFail(2);

        return view('dashboard.kemahasiswaan.pengembangan-karakter.edit-pengembangan-karakter')->with(compact('data'));
    }

    public function updatePengembanganKarakter(Request $request)
    {
        $data = Kemahasiswaan::findOrFail(2);

        $validatedData = $request->validate([
            'body' => 'required',
        ]);

        try {
            // Update departemen
            $data->update($validatedData + ['updated_at' => now('Asia/Jayapura')]);

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil diubah.');
            return redirect()->route('pengembangan-karakter');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('pengembangan-karakter')->with('message', $e->getMessage());
        }
    }

    // PENINGKATAN PRESTASI MAHASISWA
    public function peningkatanPrestasi(): View
    {
        $data = Kemahasiswaan::findOrFail(3);

        return view('dashboard.kemahasiswaan.peningkatan-prestasi.main-peningkatan-prestasi')->with(compact('data'));
    }

    public function editPeningkatanPrestasi(): View
    {
        $data = Kemahasiswaan::findOrFail(3);

        return view('dashboard.kemahasiswaan.peningkatan-prestasi.edit-peningkatan-prestasi')->with(compact('data'));
    }

    public function updatePeningkatanPrestasi(Request $request)
    {
        $data = Kemahasiswaan::findOrFail(3);

        $validatedData = $request->validate([
            'body' => 'required',
        ]);

        try {
            // Update departemen
            $data->update($validatedData + ['updated_at' => now('Asia/Jayapura')]);

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil diubah.');
            return redirect()->route('peningkatan-prestasi');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('peningkatan-prestasi')->with('message', $e->getMessage());
        }
    }

    // ALUMNI
    public function alumni(): View
    {
        $data = Kemahasiswaan::findOrFail(4);

        return view('dashboard.kemahasiswaan.alumni.main-alumni')->with(compact('data'));
    }

    public function editAlumni(): View
    {
        $data = Kemahasiswaan::findOrFail(4);

        return view('dashboard.kemahasiswaan.alumni.edit-alumni')->with(compact('data'));
    }

    public function updateAlumni(Request $request)
    {
        $data = Kemahasiswaan::findOrFail(4);

        $validatedData = $request->validate([
            'body' => 'required',
        ]);

        try {
            // Update departemen
            $data->update($validatedData + ['updated_at' => now('Asia/Jayapura')]);

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil diubah.');
            return redirect()->route('alumni');
        } catch (\Exception $e) {
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('alumni')->with('message', $e->getMessage());
        }
    }

    // ATURAN
    public function aturan(): View
    {
        $data = Kemahasiswaan::findOrFail(5);

        return view('dashboard.kemahasiswaan.aturan.main-aturan')->with(compact('data'));
    }

    public function editAturan(): View
    {
        $data = Kemahasiswaan::findOrFail(5);

        return view('dashboard.kemahasiswaan.aturan.edit-aturan')->with(compact('data'));
    }

    public function updateAturan(Request $request)
    {
        $data = Kemahasiswaan::findOrFail(5);

        $validatedData = $request->validate([
            'body' => 'required',
        ]);

        try {
            // Update departemen
            $data->update($validatedData + ['updated_at' => now('Asia/Jayapura')]);

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil diubah.');
            return redirect()->route('aturan');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('aturan')->with('message', $e->getMessage());
        }
    }
}
