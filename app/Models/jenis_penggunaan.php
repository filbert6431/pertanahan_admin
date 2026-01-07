<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_penggunaan extends Model
{
    use HasFactory;

    protected $table = 'jenis_penggunaan';
    protected $primaryKey = 'jenis_id';

    public $timestamps = false;

    protected $fillable = [
        'nama_penggunaan',
        'keterangan',
    ];
}
