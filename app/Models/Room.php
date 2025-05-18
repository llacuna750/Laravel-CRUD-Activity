<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ['name']; // ✅ Allow mass assignment of the 'name' field

    public function temperatureReadings()
    {
        return $this->hasMany(TemperatureReading::class);
    }
}
