<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Score extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'scores'; // Nombre de la tabla

    protected $primaryKey = 'score_id'; // Clave primaria personalizada

    public $incrementing = true; // La clave primaria es autoincremental

    protected $fillable = [
        'appointment_id',
        'rating',
        'comment',
        'rated_at',
    ];

    protected $casts = [
        'rating' => 'integer',
        'rated_at' => 'datetime',
    ];

    /**
     * Relación con el modelo Appointment.
     */
    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id', 'appointment_id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id', 'user_id');
    }

    /**
     * Relación con el barbero.
     */
    public function barber()
    {
        return $this->belongsTo(Barber::class, 'barber_id', 'barber_id');
    }
}