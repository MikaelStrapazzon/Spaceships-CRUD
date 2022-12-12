<?php

namespace Database\Seeders;

use App\Models\Spaceship;
use Illuminate\Database\Seeder;

class SpaceshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!Spaceship::whereName('Caravela')->exists())
            Spaceship::create([
                'name' => 'Caravela',
                'arquivo' => 'default.png',
                'fuel' => 'Matéria Negra',
                'motor_power' => '1.000 uPN',
                'quantity_weapon' => 10
            ]);

        if(!Spaceship::whereName('Destroyer')->exists())
            Spaceship::create([
                'name' => 'Destroyer',
                'arquivo' => 'default.png',
                'fuel' => 'Urânio',
                'motor_power' => '++1A5B',
                'quantity_weapon' => 26
            ]);

        if(!Spaceship::whereName('Cargor IX')->exists())
            Spaceship::create([
                'name' => 'Cargor IX',
                'arquivo' => 'default.png',
                'fuel' => 'EF5',
                'motor_power' => '500 uPN',
                'quantity_weapon' => 0
            ]);
    }
}
