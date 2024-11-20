<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{

    use HasFactory;
    protected $table = 'kandidat';
    protected $primaryKey = 'id_kandidat';
    
    public $timestamps = false;

    public function setting()
    {
        return $this->belongsTo(Setting::class, 'id_setting', 'id_setting');
    }

    protected $fillable = [
        'id_setting',
        'nama_kandidat',
        'foto',
        'alamat',
        'tanggal_lahir',
        'tempat_lahir',
        'nourut',
        'total_suara',
    ];

    
}
