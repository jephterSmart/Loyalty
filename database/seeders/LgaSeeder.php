<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\State;
use App\Models\LGA;
use App\Models\Ward;

class LgaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private function makeFactory($name, $id=1){
        return[
            'name' => $name,
            'state_id' => $id
        ];
    }
    public function run()
    {
        // LGA::factory()
        //     ->count(100)
        //     ->has(Ward::factory()
        //     ->state(function (array $attributes, LGA $lga) {
        //         return ['l_g_a_id' => $lga->id];
        //     })->count(3))
        //     ->for(State::factory())
        //     ->create();
        DB::table('l_g_a_s')->insert([
            [
            'name' => "Alimosho",
            'state_id' => 1,
        ],[
            'name' => "Ajeromi-Ifelodun",
            'state_id' => 1,
        ],
    $this->makeFactory('Kosofe'),
    $this->makeFactory('Mushin'),
    $this->makeFactory('Oshodi-Isolo'),
    $this->makeFactory('Ojo'),
    $this->makeFactory('Ikorodu'),
    $this->makeFactory('Surulere'),
    $this->makeFactory('Agege'),
    $this->makeFactory('Ifako-Ijaiye'),
    $this->makeFactory('Somolu'),
    $this->makeFactory('Amuwo-Odofin'),
    $this->makeFactory('Lagos Mainland'),
    $this->makeFactory('Ikeja'),
    $this->makeFactory('Eti-Osa'),
    $this->makeFactory('Badagry'),
    $this->makeFactory('Apapa'),
    $this->makeFactory('Lagos Island'),
    $this->makeFactory('Epe'),
    $this->makeFactory('Ibeju-Lekki')
        ]

);
    }
}
