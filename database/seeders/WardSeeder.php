<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Ward;
use App\Models\Citizen;
use App\Models\LGA;

class WardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ward::factory()
        //     ->count(200)
        //     ->has(Citizen::factory()
        //     ->state(function (array $attributes, Ward $ward) {
        //         return ['ward_id' => $ward->id];
        //     })->count(5))
        //     ->for(LGA::factory())
        //     ->create();
        DB::table('wards')->insert(
            [
            $this->makeFactory('Abule-egba/aboru/meiran/alagbado'),
            $this->makeFactory('Ayobo/ijon Village (camp David)'),
            $this->makeFactory('Egbe/agodo'),
            $this->makeFactory('Egbeda/alimosho'),
            $this->makeFactory('Idimu/isheri Olofin'),
            $this->makeFactory('Igando/egan'),
            $this->makeFactory('Ikotun/ijegun'),
            $this->makeFactory('Ipaja North'),
            $this->makeFactory('Ipaja South'),
            $this->makeFactory('Pleasure/oke-odo'),
            $this->makeFactory('Shasha/akowonjo'),
            $this->makeFactory('Ago Hausa',2),
            $this->makeFactory('Alaba Oro',2),
            $this->makeFactory('Awodi-ora',2),
            $this->makeFactory('Layeni',2),
            $this->makeFactory('Mosafejo',2),
            $this->makeFactory('Ojo Road',2),
            $this->makeFactory('Agboyi I',3),
            $this->makeFactory('Agboyi II',3),
            $this->makeFactory('Anthony/ajao Estate/mende/maryland',3),
            $this->makeFactory('Ifako/soluyi',3),
            $this->makeFactory('Ikosi Ketu/mile 12/agiliti/maidan',3),
            $this->makeFactory('Isheri-olowo-ira/shangisha/magodo Phase I & II',3),
            $this->makeFactory('Ketu/alapere/agidi/orisigun/kosofe/ajelogo/akanimodo',3),
            $this->makeFactory('Ojota/ogudu',3),
            $this->makeFactory('Alakara',4),
            $this->makeFactory('Babalosa',4)
            ]
         );
        
    }
    private function makeFactory($name, $id=1){
        return[
            'name' => $name,
            'l_g_a_id' => $id
        ];
    }
}
