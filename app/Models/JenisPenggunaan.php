<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPenggunaan extends Model
{
    use HasFactory;

    protected $table = 'jenis_penggunaan';
    protected $fillable = ['nama_penggunaan', 'keterangan']; // Adjust fillable fields as needed
}
