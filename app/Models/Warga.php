<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Builder;

class Warga extends Model
{
	// sesuaikan ke tabel yang ada di DB (bukan plural 'wargas')
	protected $table = 'Warga';

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
		'no_ktp',
        'status'

	];
 public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
{
    foreach ($filterableColumns as $column) {
        if ($request->filled($column)) {
            $query->where($column, $request->input($column));
        }
    }
    return $query;
}

public function scopeSearch($query, $request, array $columns)
{
    if ($request->filled('search')) {
        $query->where(function($q) use ($request, $columns) {
            foreach ($columns as $column) {
                $q->orWhere($column, 'LIKE', '%' . $request->search . '%');
            }
        });
    }
}


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
