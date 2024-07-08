<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    use HasFactory;

    protected $fillable = [
        'MinTemp', 'MaxTemp', 'WindSpeed9am',
        'WindSpeed3pm', 'Humidity9am', 'Humidity3pm',
        'RainToday', 'RainTomorrow'
    ];
}
