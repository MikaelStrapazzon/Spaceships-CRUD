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
//        if(!\App\Models\User::whereEmail('dev@technobox.com.br')->exists())
            Spaceship::create([
                'name' => 'Caravela',
                'arquivo' => 'tempo', // TODO fazer
                'fuel' => 'Matéria Negra',
                'motor_power' => '1.000 uPN',
                'quantity_weapon' => 10
            ]);
    }
}
