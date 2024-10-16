<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    // Daftar atribut yang boleh diisi
    protected $fillable = [
        'nama',
        'jabatan',
        'tanggal_masuk',
        'waktu_masuk',
        'waktu_keluar',
        'gaji',
    ];
}
