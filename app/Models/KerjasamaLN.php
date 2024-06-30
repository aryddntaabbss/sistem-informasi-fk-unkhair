<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KerjasamaLN extends Model
{
    use HasFactory;

    protected $table = 'kerjasama_ln';
    protected $guarded = ['id'];
}
