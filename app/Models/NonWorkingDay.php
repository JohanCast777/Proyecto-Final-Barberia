<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NonWorkingDay extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'non_working_days'; // Nombre de la tabla

    protected $primaryKey = 'non_working_day_id'; // Clave primaria personalizada

    public $incrementing = true; // La clave primaria es autoincremental

    protected $fillable = [
        'barber_id',
        'date',
        'reason',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    /**
     * Relación con el modelo Barber.
     */
    public function barber()
    {
        return $this->belongsTo(Barber::class, 'barber_id', 'barber_id');
    }
}