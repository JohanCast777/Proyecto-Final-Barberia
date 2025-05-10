<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'promotions'; // Nombre de la tabla

    protected $primaryKey = 'promotion_id'; // Clave primaria personalizada

    public $incrementing = true; // La clave primaria es autoincremental

    protected $fillable = [
        'code',
        'description',
        'discount',
        'discount_type',
        'start_date',
        'end_date',
        'max_uses',
        'active',
    ];

    protected $casts = [
        'discount' => 'float',
        'start_date' => 'date',
        'end_date' => 'date',
        'active' => 'boolean',
    ];


}