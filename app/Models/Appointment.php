<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'appointments'; // Nombre de la tabla

    protected $primaryKey = 'appointment_id'; // Clave primaria personalizada

    public $incrementing = true; // La clave primaria es autoincremental

    protected $fillable = [
        'client_id',
        'barber_id',
        'service_id',
        'scheduled_at',
        'estimated_duration',
        'status',
        'notes',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];

    /**
     * Relación con el modelo User (cliente).
     */
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id', 'user_id');
    }

    /**
     * Relación con el modelo Barber.
     */
    public function barber()
    {
        return $this->belongsTo(Barber::class, 'barber_id', 'barber_id');
    }

    /**
     * Relación con el modelo Service.
     */
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'service_id');
    }
    public function payments()
    {
        return $this->hasMany(Payment::class, 'appointment_id', 'appointment_id');
    }
    public function score()
    {
        return $this->hasOne(Score::class, 'appointment_id', 'appointment_id');
    }
}