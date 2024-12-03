<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class HistorialMedico extends Model
{
    use HasFactory;

    protected $table = 'historial_medico';

    protected $fillable = [
        'mascota_id', 'diagnostico', 'tratamiento', 
        'medicamento', 'fecha', 'activo'
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
