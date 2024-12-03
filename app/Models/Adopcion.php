<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Adopcion extends Model
{
    use HasFactory;

    protected $table = 'adopciones';
    protected $fillable = ['mascota_id', 'adoptante_nombre', 'adoptante_contacto', 'fecha_adopcion' , 'activo'];

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















