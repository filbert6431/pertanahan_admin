<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Warga extends Model
{
	// sesuaikan ke tabel yang ada di DB (bukan plural 'wargas')
	protected $table = 'warga';

	// jika primary key Anda bukan 'id', atur di sini
	protected $primaryKey = 'warga_id';

	// jika primary key auto-increment integer
	public $incrementing = true;
	protected $keyType = 'int';

	// non-standar timestamps? atur sesuai migration Anda
	public $timestamps = false;

	// kolom yang boleh diisi massal
	protected $fillable = [
		'nama', // contoh, sesuaikan dengan kolom Anda
		'email',
		'password',
		'jenis_kelamin',
		'agama',
		'pekerjaan',
		'no_hp',
	];

	/**
	 * Hash password saat diset.
	 */
	public function setPasswordAttribute($value)
	{
		if ($value !== null && $value !== '') {
			$this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
		}
	}

	public function persil()
    {
        return $this->hasMany(Persil::class, 'pemilik_warga_id', 'warga_id');
    }
}
