<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Vacunacion extends Model
{
    use HasFactory;

    protected $table = 'vacunaciones';

    protected $fillable = [
        'mascota_id',
        'vacuna',
        'fecha_aplicacion',
        'dias_siguiente_dosis',
        'fecha_proxima_dosis',
        'activo'
    ];

    protected static function booted()
    {
        static::addGlobalScope('activo', function (Builder $builder) {
            $builder->where('activo', true);
        });
    }

    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }
}
