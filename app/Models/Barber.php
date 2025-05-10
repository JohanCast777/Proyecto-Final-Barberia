<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barber extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'barbers'; // Nombre de la tabla

    protected $primaryKey = 'barber_id'; // Clave primaria personalizada

    public $incrementing = false; // La clave primaria no es autoincremental

    protected $fillable = [
        'barber_id',
        'user_id',
        'bio',
        'profile_picture',
        'average_rating',
    ];

    protected $casts = [
        'average_rating' => 'float',
    ];

    /**
     * Relación con el modelo User.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    public function workHours()
        {
            return $this->hasMany(WorkHour::class, 'barber_id', 'barber_id');
        }
        public function nonWorkingDays()
        {
            return $this->hasMany(NonWorkingDay::class, 'barber_id', 'barber_id');
        }
        public function appointments()
        {
            return $this->hasMany(Appointment::class, 'barber_id', 'barber_id');
        }
}