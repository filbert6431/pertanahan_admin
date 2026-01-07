<?php
// app/Models/PetaPersil.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class peta_persil extends Model
{
    protected $table = 'peta_persil';
    protected $primaryKey = 'peta_id';

    public $timestamps = false;

    protected $fillable = [
        'persil_id',
        'geojson',
        'panjang_m',
        'lebar_m'
    ];

    // Relasi ke persil
    public function persil()
    {
        return $this->belongsTo(Persil::class, 'persil_id', 'persil_id');
    }

    // Relasi ke media (asumsi tabel media punya kolom 'peta_id')
public function media()
{
    return $this->hasMany(Media::class, 'ref_id', 'peta_id')
                ->where('ref_table', 'peta_persil');
}
}
