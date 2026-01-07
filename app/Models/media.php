<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class media extends Model
{
    protected $table = 'media';
    protected $primaryKey = 'media_id';

    public $timestamps = false;
    protected $fillable = [
        'ref_table',   // nama tabel relasi (dokumen_persil, berita, dll)
        'ref_id',      // id dari tabel relasi
        'file_url',    // nama file / path file
        'caption',     // keterangan file
        'mime_type',   // tipe file (pdf, image/jpeg, dll)
        'sort_order',  // urutan tampilan
    ];

    /**
     * Helper: ambil URL file lengkap
     */
    public function getUrlAttribute()
    {
        return asset('storage/uploads/' . $this->file_url);
    }
}
