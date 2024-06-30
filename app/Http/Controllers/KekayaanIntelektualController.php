<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KekayaanIntelektual;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class KekayaanIntelektualController extends Controller
{
    public function index(): View
    {
        $data = KekayaanIntelektual::findOrFail(1);

        return view('dashboard.riset-inovasi.kekayaan-intelektual.main')->with(compact('data'));
    }

    public function edit(): View
    {
        $data = KekayaanIntelektual::findOrFail(1);

        return view('dashboard.riset-inovasi.kekayaan-intelektual.edit')->with(compact('data'));
    }

    public function update(Request $request)
    {
        $data = KekayaanIntelektual::findOrFail(1);

        $validatedData = $request->validate([
            'body' => 'required',
        ]);

        try {
            // Update departemen
            $data->update($validatedData + ['updated_at' => now('Asia/Jayapura')]);

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil diubah.');
            return redirect()->route('hak-kekayaan-intelektual');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('hak-kekayaan-intelektual')->with('message', $e->getMessage());
        }
    }
}
