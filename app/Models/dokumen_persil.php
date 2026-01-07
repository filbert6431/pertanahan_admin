<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dokumen_persil extends Model
{
    protected $table = 'dokumen_persil';
    protected $primaryKey = 'dokumen_id';

    public $timestamps = false;

    protected $fillable = [
        'persil_id',
        'jenis_dokumen',
        'nomor',
        'keterangan'
    ];
    protected function persil()
    {
        return $this->belongsTo(Persil::class, 'persil_id', 'persil_id');
}

public function media()
{
    return $this->hasMany(Media::class, 'ref_id', 'dokumen_id')
        ->where('ref_table', 'dokumen_persil');
}
}
