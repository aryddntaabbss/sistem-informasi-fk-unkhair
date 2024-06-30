<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Profil;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    // SEJARAH
    public function sejarah(): View
    {
        $data = Profil::findOrFail(1);

        return view('dashboard.profil.sejarah.main-sejarah')->with(compact('data'));
    }

    public function editSejarah(): View
    {
        $data = Profil::findOrFail(1);

        return view('dashboard.profil.sejarah.edit-sejarah')->with(compact('data'));
    }

    public function updateSejarah(Request $request)
    {
        $data = Profil::findOrFail(1);

        $validatedData = $request->validate([
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'body' => 'nullable',
        ]);

        try {
            if ($request->hasFile('image_path')) {
                if ($data->image_path) {
                    Storage::delete('public/' . $data->image_path);
                }

                $uniqueFileName = $request->file('image_path')->hashName();
                $request->file('image_path')->storeAs('public/ProfilImage', $uniqueFileName);
                $validatedData['image_path'] = 'profilimage/' . $uniqueFileName;
            } else {
                $validatedData['image_path'] = $data->image_path;
            }

            // Update sejarah
            $data->update($validatedData + ['updated_at' => now('Asia/Jayapura')]);

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil diubah.');
            return redirect()->route('sejarah');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('sejarah')->with('message', $e->getMessage());
        }
    }

    // VISI MISI
    public function visimisi(): View
    {
        $data = Profil::findOrFail(2);

        return view('dashboard.profil.visi-misi.main-visi')->with(compact('data'));
    }

    public function editVisiMisi(): View
    {
        $data = Profil::findOrFail(2);

        return view('dashboard.profil.visi-misi.edit-visi')->with(compact('data'));
    }

    public function updateVisiMisi(Request $request)
    {
        $data = Profil::findOrFail(2);

        $validatedData = $request->validate([
            'body' => 'required',
        ]);

        try {
            // Update visi-misi
            $data->update($validatedData + ['updated_at' => now('Asia/Jayapura')]);

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil diubah.');
            return redirect()->route('visi-misi');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('visi-misi')->with('message', $e->getMessage());
        }
    }


    // STRUKTUR
    public function struktur(): View
    {
        $data = Profil::findOrFail(3);

        return view('dashboard.profil.struktur-organisasi.main-struktur')->with(compact('data'));
    }

    public function editStruktur(): View
    {
        $data = Profil::findOrFail(3);

        return view('dashboard.profil.struktur-organisasi.edit-struktur')->with(compact('data'));
    }

    public function updateStruktur(Request $request)
    {
        $data = Profil::findOrFail(3);

        $validatedData = $request->validate([
            'image_path' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            if ($request->hasFile('image_path')) {
                if ($data->image_path) {
                    Storage::delete('public/' . $data->image_path);
                }

                $uniqueFileName = $request->file('image_path')->hashName();
                $request->file('image_path')->storeAs('public/ProfilImage', $uniqueFileName);
                $validatedData['image_path'] = 'profilimage/' . $uniqueFileName;
            }

            // Update struktur
            $data->update($validatedData + ['updated_at' => now('Asia/Jayapura')]);

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil diubah.');
            return redirect()->route('struktur');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('struktur')->with('message', $e->getMessage());
        }
    }

    // MANAJEMEN
    public function manajemen(): View
    {
        $data = Profil::findOrFail(4);

        return view('dashboard.profil.manajemen.main-manajemen')->with(compact('data'));
    }

    public function editManajemen(): View
    {
        $data = Profil::findOrFail(4);

        return view('dashboard.profil.manajemen.edit-manajemen')->with(compact('data'));
    }

    public function updateManajemen(Request $request)
    {
        $data = Profil::findOrFail(4);

        $validatedData = $request->validate([
            'image_path' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            if ($request->hasFile('image_path')) {
                if ($data->image_path) {
                    Storage::delete('public/' . $data->image_path);
                }

                $uniqueFileName = $request->file('image_path')->hashName();
                $request->file('image_path')->storeAs('public/ProfilImage', $uniqueFileName);
                $validatedData['image_path'] = 'profilimage/' . $uniqueFileName;
            }

            // Update manajemen
            $data->update($validatedData + ['updated_at' => now('Asia/Jayapura')]);

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil diubah.');
            return redirect()->route('manajemen');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('manajemen')->with('message', $e->getMessage());
        }
    }

    // MASTER PLAN
    public function masterPlan(): View
    {
        $data = Profil::findOrFail(5);

        return view('dashboard.profil.master-plan.main-master-plan')->with(compact('data'));
    }

    public function updateMasterPlan(Request $request)
    {
        $data = Profil::findOrFail(5);

        $validatedData = $request->validate([
            'image_path' => 'required|file|mimes:pdf',
        ]);

        try {
            if ($request->hasFile('image_path')) {
                if ($data->image_path) {
                    Storage::delete('public/' . $data->image_path);
                }

                $fileName = $request->file('image_path')->hashName();
                $request->file('image_path')->storeAs('public/Docs', $fileName);
                $validatedData['image_path'] = 'docs/' . $fileName;
            }

            // Update Dokumen & tgl perbarui
            $data->update($validatedData + ['updated_at' => now('Asia/Jayapura')]);

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil diubah.');
            return redirect()->route('master-plan');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('master-plan')->with('message', $e->getMessage());
        }
    }

    public function clearMasterPlan()
    {
        try {
            $data = Profil::findOrFail(5);

            if ($data->image_path) {
                Storage::delete('public/' . $data->image_path);
            }

            // Hapus kolom image_path
            $data->update(['image_path' => null]);

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil dihapus.');
            return redirect()->route('master-plan');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('master-plan')->with('message', $e->getMessage());
        }
    }
}
