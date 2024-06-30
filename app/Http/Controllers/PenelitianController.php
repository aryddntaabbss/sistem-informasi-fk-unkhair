<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Penelitian;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PenelitianController extends Controller
{
    public function index(): View
    {
        $data = Penelitian::all();

        return view('dashboard.riset-inovasi.daftar-penelitian.main-daftar-penelitian')->with('data', $data);
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $validatedData =  $request->validate([
            'nama' => 'required|max:255',
            'nip' => 'required|max:255',
            'judul' => 'required|max:255',
            'prodi' => 'required|max:255',
            'tahun' => 'required',
        ]);

        try {
            Penelitian::create($validatedData);

            toastr()->success('Data telah berhasil ditambahkan.');
            return redirect()->route('daftar-penelitian');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('daftar-penelitian')->with('message', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $data = Penelitian::findOrFail($id);
            $data->delete();

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil dihapus.');
            return redirect()->route('daftar-penelitian');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('daftar-penelitian')->with('message', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $data = Penelitian::findOrFail($id);

        // Validasi input dari form
        $validatedData =  $request->validate([
            'nama' => 'required|max:255',
            'nip' => 'required|max:255',
            'judul' => 'required|max:255',
            'prodi' => 'required|max:255',
            'tahun' => 'required',
        ]);

        try {
            // Update
            $data->update($validatedData + ['updated_at' => now('Asia/Jayapura')]);

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil diubah.');
            return redirect()->route('daftar-penelitian');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('daftar-penelitian')->with('message', $e->getMessage());
        }
    }
}
