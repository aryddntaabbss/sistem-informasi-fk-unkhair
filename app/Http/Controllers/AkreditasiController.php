<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Akreditasi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AkreditasiController extends Controller
{
    public function index(): View
    {
        $data = Akreditasi::all();

        return view('dashboard.akademik.akreditasi.main-akreditasi')->with('data', $data);
    }

    public function store(Request $request)
    {
        // dd($request);
        // Validasi input dari form
        $validatedData =  $request->validate([
            'jenis' => 'required|max:255',
            'nama_prodi' => 'required|max:255',
            'peringkat' => 'required|max:255',
            'akreditasi_nas' => 'required|max:255',
            'tgl_exp_akreditasi_nas' => 'required|date',
            'akreditasi_inter' => 'max:255',
            'tgl_exp_akreditasi_inter' => 'nullable|date',
        ]);

        try {
            // Buat data kerjasama baru
            Akreditasi::create($validatedData);
            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil ditambahkan.');
            return redirect()->route('akreditasi');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('akreditasi')->with('status', 'error')->with('message', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $data = Akreditasi::findOrFail($id);
            $data->delete();

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil dihapus.');
            return redirect()->route('akreditasi');
        } catch (\Exception $e) {
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('akreditasi')->with('message', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $data = Akreditasi::findOrFail($id);

        // Validasi input dari form
        $validatedData =  $request->validate([
            'jenis' => 'required|max:255',
            'nama_prodi' => 'required|max:255',
            'peringkat' => 'required|max:255',
            'akreditasi_nas' => 'required|max:255',
            'tgl_exp_akreditasi_nas' => 'required|date',
            'akreditasi_inter' => 'max:255',
            'tgl_exp_akreditasi_inter' => 'nullable|date',
        ]);

        try {
            // Update
            $data->update($validatedData + ['updated_at' => now('Asia/Jayapura')]);

            toastr()->success('Data telah berhasil diubah.');
            return redirect()->route('akreditasi');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('akreditasi')->with('message', $e->getMessage());
        }
    }

    public function downloadPdf()
    {
        $a = Akreditasi::all()->toArray();
        $data = [
            'akreditasi' => $a,
            'title' => 'akreditasi.pdf'
        ];

        $pdf = Pdf::loadView('blog.pdf.akreditasi_pdf', ['data' => $data]);
        return $pdf->stream('akreditasi.pdf');
    }
}
