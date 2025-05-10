<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'payments'; // Nombre de la tabla

    protected $primaryKey = 'payment_id'; // Clave primaria personalizada

    public $incrementing = true; // La clave primaria es autoincremental

    protected $fillable = [
        'appointment_id',
        'amount',
        'payment_method',
        'status',
        'paid_at',
        'transaction_id',
    ];

    protected $casts = [
        'amount' => 'float',
        'paid_at' => 'datetime',
    ];

    /**
     * Relación con el modelo Appointment.
     */
    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id', 'appointment_id');
    }
}