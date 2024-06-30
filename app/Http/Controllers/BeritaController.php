<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{

    public function index(): View
    {
        $query = Berita::query();

        if (auth()->user()->id != 1) {
            $query->where('author_id', auth()->id());
        }

        $data = $query->orderBy('updated_at', 'desc')->orderBy('created_at', 'desc')->paginate(10);

        return view('dashboard.profil.berita.main-berita', compact('data'));
    }

    public function create(): View
    {
        // dd($data);
        return view('dashboard.profil.berita.tambah-berita');
    }

    public function store(Request $request)
    {
        // dd($request);
        // Validasi input dari form
        $validatedData =  $request->validate([
            'title' => 'required|max:255|unique:beritas',
            // 'slug' => 'required|unique:beritas',
            'image_path' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'body' => 'required',
        ]);


        try {
            // Buat artikel baru
            if ($request->hasFile('image_path')) {
                $uniqueFileName = $request->file('image_path')->hashName();
                $request->file('image_path')->storeAs('public/BeritaImage', $uniqueFileName);
                $validatedData['image_path'] = 'BeritaImage/' . $uniqueFileName;
            }

            $validatedData['author_id'] = auth()->user()->id;
            $validatedData['excerpt'] = Str::limit(strip_tags($validatedData['body']), 200);
            $validatedData['slug'] = Str::slug($request->title, '-');

            Berita::create($validatedData);
            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil di tambahkan.');
            return redirect()->route('berita');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('berita')->with('message', $e->getMessage());
        }
    }

    public function show($slug): View
    {
        $post = Berita::where('slug', $slug)->firstOrFail();
        return view('dashboard.profil.berita.detail-berita', [
            'post' => $post
        ]);
    }

    public function edit($slug): View
    {
        $post = Berita::where('slug', $slug)->firstOrFail();
        return view('dashboard.profil.berita.ubah-berita', [
            'post' => $post
        ]);
    }

    public function update(Request $request, $slug)
    {
        // Validasi input dari form
        $post = Berita::where('slug', $slug)->firstOrFail();

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:beritas,slug,' . $post->id, // Ensure there are no extra spaces
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'body' => 'required',
        ]);

        try {
            if ($request->hasFile('image_path')) {
                if ($post->image_path) {
                    Storage::delete('public/' . $post->image_path);
                }

                $uniqueFileName = $request->file('image_path')->hashName();
                $request->file('image_path')->storeAs('public/InformationImage', $uniqueFileName);
                $validatedData['image_path'] = 'informationimage/' . $uniqueFileName;
            }

            // Update artikel
            $post->update($validatedData + ['updated_at' => now('Asia/Jayapura')]);

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil diubah.');
            return redirect()->route('berita');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('berita')->with('message', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $post = Berita::findOrFail($id);

            if ($post->image_path) {
                Storage::delete('public/' . $post->image_path);
            }

            // Hapus artikel
            $post->delete();

            // Berikan pesan sukses jika berhasil
            toastr()->success('Data telah berhasil dihapus.');
            return redirect()->route('berita');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('berita')->with('message', $e->getMessage());
        }
    }

    public function checkSlug(Request $request)
    {
        try {
            $slug = SlugService::createSlug(Berita::class, 'slug', $request->title);
            return response()->json(['slug' => $slug]);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
