<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkHour extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'work_hours'; // Nombre de la tabla

    protected $primaryKey = 'work_hour_id'; // Clave primaria personalizada

    public $incrementing = true; // La clave primaria es autoincremental

    protected $fillable = [
        'barber_id',
        'day_of_week',
        'start_time',
        'end_time',
    ];

    protected $casts = [
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
    ];

    /**
     * Relación con el modelo Barber.
     */
    public function barber()
    {
        return $this->belongsTo(Barber::class, 'barber_id', 'barber_id');
    }
}

