<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sengketa_persil extends Model
{
    protected $table ='sengketa_persil';
    protected $primaryKey = 'sengketa_id';

    public $timestamps = false;

    protected $fillable = [
        'persil_id',
        'pihak_1',
        'pihak_2',
        'kronologi',
        'status',
        'penyelesaian',
    ];
    protected function persil()
    {
        return $this->belongsTo(Persil::class, 'persil_id', 'persil_id');
    }
    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'sengketa_id')
            ->where('ref_table', 'sengketa_persil');
    }
}
