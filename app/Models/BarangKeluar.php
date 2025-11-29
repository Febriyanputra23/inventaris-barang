<?php
// app/Models/BarangKeluar.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    protected $fillable = [
        'barang_id', 
        'jumlah', 
        'tanggal',
        'penerima',       // TAMBAH INI
        'keterangan'      // TAMBAH INI
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}