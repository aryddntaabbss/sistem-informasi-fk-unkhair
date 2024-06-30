<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function editProfil(): View
    {
        $data = auth()->user();
        return view('dashboard.edit-profil.edit-profil', ['data' => $data]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        try {
            $user = $request->user();
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'password' => 'nullable|max:255',
            ]);

            // Jika password baru disediakan, hash password baru
            if (isset($validatedData['password'])) {
                $validatedData['password'] = Hash::make($validatedData['password']);
            } else {
                // Jika password tidak disediakan, gunakan password lama
                $validatedData['password'] = $user->password;
            }

            $user->update($validatedData);
            toastr()->success('Data telah berhasil diubah.');
            return redirect()->route('edit-profil');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            toastr()->error('Terjadi Kesalahan.');
            return redirect()->route('edit-profil')->with('message', $e->getMessage());
        }
    }
}
