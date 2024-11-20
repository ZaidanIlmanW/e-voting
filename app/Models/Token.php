<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $table = 'token';
    protected $fillable = ['token', 'id_setting', 'is_pakai'];
    public $timestamps = false;
    protected $primaryKey = 'token'; // Ubah primary key ke kolom token
    public $incrementing = false; // Karena kolom token bukan integer dan tidak auto-increment
    protected $keyType = 'string';

    public function setting()
    {
        return $this->belongsTo(Setting::class, 'id_setting', 'id_setting');
    }

     public function scopeOrderBySetting($query)
    {
        return $query->with('setting')->join('setting', 'token.id_setting', '=', 'setting.id_setting')
                     ->orderBy('setting.judul_pemilihan', 'asc')
                     ->select('token.*'); // Memastikan hanya kolom token yang dipilih
    }
}
