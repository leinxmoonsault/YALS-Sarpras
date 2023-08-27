<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SarprasKelas extends Model
{
    use HasFactory;
    protected $table = 'sarpras_kelas';

    protected $fillable = [
        'id_kelas_sarpras',
        'id_barang_sarpras',
        'nama_barang',
        'jumlah_barang',
        'kondisi',
        'keterangan',
        'update_by',
        'created_at'
    ];
}
