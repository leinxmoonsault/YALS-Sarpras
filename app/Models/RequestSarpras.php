<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestSarpras extends Model
{
    use HasFactory;
    protected $table = 'request_sarpras';

    protected $fillable = [
        'id_req',
        'untuk_ruang',
        'nama_barang',
        'jumlah_barang',
        'harga_barang',
        'status',
        'keterangan',
        'tanggal_req',
        'req_by',
        'created_at'
    ];
}
