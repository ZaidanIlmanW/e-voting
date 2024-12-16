<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Setting extends Model 
{
    use HasFactory;

    protected $table = 'setting'; // Table name
    protected $primaryKey = 'id_setting'; // Primary key (if it's custom)
    public $timestamps = false; // Set to true if you have created_at and updated_at columns




    
    protected $fillable = [
        'nama_setting',
        'judul_pemilihan',
        'limit_voting_min',
        'limit_voting_max',
        'tgl_awal',
        'tgl_akhir',
        'is_aktif',
    ];

    public function kandidat()
    {
        return $this->hasMany(Kandidat::class, 'id_setting', 'id_setting');
    }

    public function isPemilihanAktif()
    {
        $now = Carbon::now();
        return $this->is_aktif && $now->between(Carbon::parse($this->tgl_awal), Carbon::parse($this->tgl_akhir));
    }

    
    
    

}
