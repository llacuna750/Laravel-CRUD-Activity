<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = ['name']; // ✅ Allow mass assignment

    public function temperatureReadings()
    {
        return $this->hasMany(TemperatureReading::class);
    }
}
