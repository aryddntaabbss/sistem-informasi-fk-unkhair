<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Akademik;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AkademikController extends Controller
{
    // DEPARTEMEN
    public function departemen(): View
    {
        $data = Akademik::findOrFail(1);

        return view('dashboard.akademik.departemen.main-departemen')->with(compact('data'));
    }

    public function editDepartemen(): View
    {
        $data = Akademik::findOrFail(1);

        return view('dashboard.akademik.departemen.edit-departemen')->with(compact('data'));
    }

    public function updateDepartemen(Request $request)
    {
        $data = Akademik::findOrFail(1);

        $validatedData = $request->validate([
            'body' => 'required',
        ]);

        try {
            // Update departemen
            $data->update($validatedData + ['updated_at' => now('Asia/Jayapura')]);

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil diubah.');
            return redirect()->route('departemen');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('departemen')->with('message', $e->getMessage());
        }
    }


    // PROGRAM MAGISTER
    public function magister(): View
    {
        $data = Akademik::findOrFail(2);

        return view('dashboard.akademik.magister.main-magister')->with(compact('data'));
    }

    public function editMagister(): View
    {
        $data = Akademik::findOrFail(2);

        return view('dashboard.akademik.magister.edit-magister')->with(compact('data'));
    }

    public function updateMagister(Request $request)
    {
        $data = Akademik::findOrFail(2);

        $validatedData = $request->validate([
            'body' => 'required',
        ]);

        try {
            // Update magister
            $data->update($validatedData + ['updated_at' => now('Asia/Jayapura')]);

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil diubah.');
            return redirect()->route('magister');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('magister')->with('message', $e->getMessage());
        }
    }


    // PROGRAM DOKTOR
    public function doktor(): View
    {
        $data = Akademik::findOrFail(3);

        return view('dashboard.akademik.doktor.main-doktor')->with(compact('data'));
    }

    public function editDoktor(): View
    {
        $data = Akademik::findOrFail(3);

        return view('dashboard.akademik.doktor.edit-doktor')->with(compact('data'));
    }

    public function updateDoktor(Request $request)
    {
        $data = Akademik::findOrFail(3);

        $validatedData = $request->validate([
            'body' => 'required',
        ]);

        try {
            // Update magister
            $data->update($validatedData + ['updated_at' => now('Asia/Jayapura')]);

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil diubah.');
            return redirect()->route('doktor');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('doktor')->with('message', $e->getMessage());
        }
    }

    // PROGRAM PROFESI
    public function profesi(): View
    {
        $data = Akademik::findOrFail(4);

        return view('dashboard.akademik.profesi.main-profesi')->with(compact('data'));
    }

    public function editProfesi(): View
    {
        $data = Akademik::findOrFail(4);

        return view('dashboard.akademik.profesi.edit-profesi')->with(compact('data'));
    }

    public function updateProfesi(Request $request)
    {
        $data = Akademik::findOrFail(4);

        $validatedData = $request->validate([
            'body' => 'required',
        ]);

        try {
            // Update magister
            $data->update($validatedData + ['updated_at' => now('Asia/Jayapura')]);

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil diubah.');
            return redirect()->route('profesi');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('profesi')->with('message', $e->getMessage());
        }
    }

    // PROGRAM PROFESI
    public function kalender(): View
    {
        $data = Akademik::findOrFail(5);

        return view('dashboard.akademik.kalender.main-kalender')->with(compact('data'));
    }

    public function editKalender(): View
    {
        $data = Akademik::findOrFail(5);

        return view('dashboard.akademik.kalender.edit-kalender')->with(compact('data'));
    }

    public function updateKalender(Request $request)
    {
        $data = Akademik::findOrFail(5);

        $validatedData = $request->validate([
            'body' => 'required',
        ]);

        try {
            // Update magister
            $data->update($validatedData + ['updated_at' => now('Asia/Jayapura')]);

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil diubah.');
            return redirect()->route('kalender');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('kalender')->with('message', $e->getMessage());
        }
    }
}
