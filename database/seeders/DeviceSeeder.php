<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Device;

class DeviceSeeder extends Seeder
{
    public function run(): void
    {
        $devices = [
            'Thermometer A1',
            'Humidity Sensor B2',
            'Temperature Sensor C3',
            'Smart HVAC Controller',
            'Climate Monitor D4',
            'Thermal Detector E5',
            'IoT Thermostat F6',
            'Wireless Temp Sensor G7',
            'Smart AC Sensor H8',
            'Indoor Temp Monitor I9',
        ];

        foreach ($devices as $deviceName) {
            Device::create([
                'name' => $deviceName,
            ]);
        }
    }
}
