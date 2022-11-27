<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable =[
        'nama_konser',
        'jenis_tiket',
        'tanggal',
        'waktu',
        'lokasi',
        'jumlah_tiket',
        'total_harga'
    ];
}
