<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TemperatureReading;
use App\Models\Room;
use App\Models\Device;
use Illuminate\Support\Carbon;

class TemperatureReadingSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = Room::all();
        $devices = Device::all();

        foreach (range(1, 10) as $i) {
            TemperatureReading::create([
                'room_id' => $rooms->random()->id,
                'device_id' => $devices->random()->id,
                'temperature' => rand(180, 300) / 10, // 18.0°C to 30.0°C
                'recorded_at' => Carbon::now()->subDays(rand(0, 10)),
            ]);
        }
    }
}