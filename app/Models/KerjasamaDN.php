<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KerjasamaDN extends Model
{
    use HasFactory;

    protected $table = 'kerjasama_dn';
    protected $guarded = ['id'];
}
