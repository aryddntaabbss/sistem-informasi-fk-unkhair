<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruBesar extends Model
{
    use HasFactory;

    protected $table = 'guru_besar';
    protected $guarded = ['id'];
}
