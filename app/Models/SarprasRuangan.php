<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SarprasRuangan extends Model
{
    use HasFactory;
    protected $table = 'sarpras_ruangan';

    protected $fillable = [
        'id_ruangan_sarpras',
        'id_barang_sarpras_ruangan',
        'nama_barang',
        'jumlah_barang',
        'kondisi',
        'keterangan',
        'update_by',
        'created_at'
    ];
}
