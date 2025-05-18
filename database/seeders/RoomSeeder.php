<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = [
            'Living Room',
            'Bedroom 1',
            'Bedroom 2',
            'Kitchen',
            'Dining Room',
            'Bathroom',
            'Garage',
            'Home Office',
            'Basement',
            'Attic',
        ];

        foreach ($rooms as $roomName) {
            Room::create([
                'name' => $roomName,
            ]);
        }
    }
}
