<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(): View
    {
        $data = Dosen::all();

        return view('dashboard.sumber-daya.dosen.main-dosen')->with('data', $data);
    }

    public function store(Request $request)
    {
        // dd($request);
        // Validasi input dari form
        $validatedData =  $request->validate([
            'nama' => 'required|max:255',
            'departemen' => 'required|max:255',
            'nip' => 'required|max:255',
            'golongan' => 'required|max:255',
        ]);

        try {
            // Buat data kerjasama baru
            Dosen::create($validatedData);
            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil ditambahkan.');
            return redirect()->route('dosen');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('dosen')->with('message', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $data = Dosen::findOrFail($id);
            $data->delete();

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil dihapus.');
            return redirect()->route('dosen');
        } catch (\Exception $e) {
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('dosen')->with('message', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $data = Dosen::findOrFail($id);

        // Validasi input dari form
        $validatedData =  $request->validate([
            'nama' => 'required|max:255',
            'departemen' => 'required|max:255',
            'nip' => 'required|max:255',
            'golongan' => 'required|max:255',
        ]);

        try {
            // Update
            $data->update($validatedData + ['updated_at' => now('Asia/Jayapura')]);

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil diubah.');
            return redirect()->route('dosen');
        } catch (\Exception $e) {
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('dosen')->with('message', $e->getMessage());
        }
    }
}
