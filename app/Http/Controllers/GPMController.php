<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\GPM;
use DOMDocument;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GPMController extends Controller
{
    public function index(): View
    {
        $data = GPM::all();

        return view('dashboard.gpm-pr.main-gpm-pr', compact('data'));
    }

    public function edit($id): View
    {
        $data = GPM::findOrFail($id);

        return view('dashboard.gpm-pr.edit-gpm-pr', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $post = GPM::findOrFail($id);

        $body = $request->body;

        $dom = new DOMDocument();
        $dom->loadHTML($body, 9);

        $images = $dom->getElementsByTagName('img');
        foreach ($images as $key => $img) {
            if (strpos($img->getAttribute('src'), 'data:image/') === 0) {
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $image_name = "/upload/" . time() . $key . '.png';
                file_put_contents(public_path() . $image_name, $data);

                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }

        $body = $dom->saveHTML();

        $post->update([
            'body' => $body
        ]);
        toastr()->success('Data telah berhasil diubah.');
        return redirect()->route('gpm-pr');
    }

    public function show($id): View
    {
        $data = GPM::findOrFail($id);

        return view('dashboard.gpm-pr.detail-gpm-pr', compact('data'));
    }

    public function destroy($id)
    {
        $data = GPM::findOrFail($id);

        $dom = new DOMDocument();
        $dom->loadHTML($data->body, 9);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $src = $img->getAttribute('src');
            $path = Str::of($src)->after('/');

            if (File::exists($path)) {
                File::delete($path);
            }
        }

        // Hapus kolom body
        $data->update(['body' => null]);
        toastr()->success('Data telah berhasil dihapus.');
        return redirect()->route('gpm-pr');
    }
}
