<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KebersihanSekolah extends Model
{
    use HasFactory;
    protected $table = 'kebersihan_lantai';

    protected $fillable = [
        'id_kebersihan',
        'nama_assets',
        'kebersihan',
        'tanggal_kebersihan	',
        'update_by'
    ];
}
