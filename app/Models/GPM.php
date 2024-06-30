<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GPM extends Model
{
    use HasFactory;

    protected $table = 'gpm';
    protected $guarded = ['id'];
}
