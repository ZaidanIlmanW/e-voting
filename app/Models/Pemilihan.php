<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilihan extends Model
{
    use HasFactory;

    protected $table = 'pemilihan';
    protected $guarded = [];
    public $timestamps = false;


    // Tambahkan properti fillable
    protected $fillable = [
        'tgl',         // Kolom tanggal
        'id_setting',  // Foreign key ke tabel setting
    ];

    public function detail()
    {
        return $this->hasMany(PemilihanDetail::class, 'id_pemilihan', 'id_pemilihan');
    }

    public function setting()
    {
        return $this->belongsTo(Setting::class, 'id_setting', 'id_setting');
    }
    
}
