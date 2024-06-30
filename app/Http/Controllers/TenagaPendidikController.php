<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TenagaPendidik;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TenagaPendidikController extends Controller
{
    public function index(): View
    {
        $data = TenagaPendidik::all();

        return view('dashboard.sumber-daya.tenaga-kependidikan.main-tenaga-kependidikan')->with('data', $data);
    }

    public function store(Request $request)
    {
        // dd($request);
        // Validasi input dari form
        $validatedData =  $request->validate([
            'nama' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'nip' => 'required|max:255',
            'golongan' => 'required|max:255',
        ]);

        try {
            // Buat data kerjasama baru
            TenagaPendidik::create($validatedData);
            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil ditambahkan.');
            return redirect()->route('tenaga-kependidikan');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('tenaga-kependidikan')->with('message', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $data = TenagaPendidik::findOrFail($id);
            $data->delete();

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil dihapus.');
            return redirect()->route('tenaga-kependidikan');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('tenaga-kependidikan')->with('message', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $data = TenagaPendidik::findOrFail($id);

        // Validasi input dari form
        $validatedData =  $request->validate([
            'nama' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'nip' => 'required|max:255',
            'golongan' => 'required|max:255',
        ]);

        try {
            // Update
            $data->update($validatedData + ['updated_at' => now('Asia/Jayapura')]);

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil diubah.');
            return redirect()->route('tenaga-kependidikan');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('tenaga-kependidikan')->with('message', $e->getMessage());
        }
    }
}
