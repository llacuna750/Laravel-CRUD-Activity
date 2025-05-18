<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemperatureReading extends Model
{
    protected $fillable = ['room_id', 'device_id', 'temperature', 'recorded_at'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
