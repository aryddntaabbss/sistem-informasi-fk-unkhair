<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class KelolaUserController extends Controller
{
    public function show()
    {
        $data = User::where('id', '!=', 1)->get();
        return view('dashboard.kelola-pengguna.main')->with(compact('data'));
    }
}
