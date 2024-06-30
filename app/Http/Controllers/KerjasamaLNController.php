<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KerjasamaLN;
use Illuminate\Contracts\View\View;

class KerjasamaLNController extends Controller
{

    public function index(): View
    {
        $data = KerjasamalN::all();

        return view('dashboard.kemitraan.kerjasama-ln.main')->with('data', $data);
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $validatedData =  $request->validate([
            'country' => 'required|max:255',
            'faculty' => 'required|max:255',
            'partner' => 'required|max:255',
            'start' => 'required',
            'end' => 'required',
        ]);

        try {
            // Buat data kerjasama baru
            KerjasamaLN::create($validatedData);
            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil ditambahkan.');
            return redirect()->route('kerjasama-luar-negeri');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('kerjasama-luar-negeri')->with('message', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $k = KerjasamaLN::findOrFail($id);
            $k->delete();

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil dihapus.');
            return redirect()->route('kerjasama-luar-negeri');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('kerjasama-luar-negeri')->with('message', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $data = KerjasamaLN::findOrFail($id);

        // Validasi input dari form
        $validatedData =  $request->validate([
            'country' => 'required|max:255',
            'faculty' => 'required|max:255',
            'partner' => 'required|max:255',
            'start' => 'required',
            'end' => 'required',
        ]);

        try {
            // Update
            $data->update($validatedData + ['updated_at' => now('Asia/Jayapura')]);

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil diubah.');
            return redirect()->route('kerjasama-luar-negeri');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('kerjasama-luar-negeri')->with('message', $e->getMessage());
        }
    }
}
