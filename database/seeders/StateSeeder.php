<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\State;
use App\Models\LGA;

class StateSeeder extends Seeder
{
    private function makeFactory($name){
        return[
            'name' => $name,
        ];
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // State::factory()
        //     ->count(20)
        //     ->has(LGA::factory()
        //     ->state(function (array $attributes, State $state) {
        //         return ['state_id' => $state->id];
        //     })
        //     ->count(5))
        //     ->create();
        DB::table('states')->insert(
           $this->makeFactory('Lagos')
        );
    }
}
