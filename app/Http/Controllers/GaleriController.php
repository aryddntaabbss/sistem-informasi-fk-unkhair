<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index(): View
    {
        $data = Galeri::all();

        return view('dashboard.galeri.main')->with('data', $data);
    }

    public function store(Request $request)
    {
        // dd($request);
        // Validasi input dari form
        $validatedData =  $request->validate([
            'image_path' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            if ($request->hasFile('image_path')) {
                $uniqueFileName = $request->file('image_path')->hashName();
                $request->file('image_path')->storeAs('public/Galeri', $uniqueFileName);
                $validatedData['image_path'] = 'Galeri/' . $uniqueFileName;
            }

            Galeri::create($validatedData);

            toastr()->success('Data telah berhasil ditambahkan.');
            return redirect()->route('galeri');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('galeri')->with('message', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $data = Galeri::findOrFail($id);

            if ($data->image_path) {
                Storage::delete('public/' . $data->image_path);
            }
            $data->delete();

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil dihapus.');
            return redirect()->route('galeri');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('galeri')->with('message', $e->getMessage());
        }
    }
}
