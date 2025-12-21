<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\District;
use App\Models\Town;
use App\Models\Clan;

class TownSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            'Zorzor District' => [
                'Gizzima clan' => [
                'Zorzor City',
                'Fissebu Town',
                'Yeala Town',
                'Kalemai Town',
                'Zelekpala Town',
                'Zolowo Town',
                'Wenwuta Town',
                'Fassawalazu Town',
                'Zomai Town',
                'Vassala Town',
                ],
                'Zayema Clan' => [
                'Wowuzu Town',
                'Borkeza Town',
                'Wakesu Town',
                'Kpassagizia Town',
                'Zelemi Town',
                'Zuwulor Town',
                'Ziggida Town',
                ],
                'Bluyema Clan' => [
                'Wuomai Town',
                'Baloma Town',
                'Bodah Town',
                'Bagwalazu Town',
                'Labalabah Town',
                'Bardezu Town',
                ],
            ],
            'Salayea District' => [
                'Vavalah Clan' => [
                'Kpaiyea Town',
                'Scruomu Town',
                'Gbanway Town',
                'Yarpuah Town',
                'Telemi Town',
            ],
                'Gbaarlin Clan' => [
                'Kpayakulleh Town',
                'Kpowonsenyea Town',
                'Kpateyea Town',
                'Gorlu Town',
                'Gbbonyea Town',
                'Gbagehta Town',
                'Barkolleh New Town',
            ],
                'Palama Clan' => [
                'Ganglota Town',
                'Salayea City',
                'Telemu Town',
                'Tinsue Town',
                'Beyan Town',
            ],
            ],
        ];

        foreach ($data as $districtName => $clans) {
            $district = District::firstOrCreate(['name' => $districtName]);

            foreach ($clans as $clanName => $towns) {
                $clan = $district->clans()->firstOrCreate(['name' => $clanName]);

                foreach ($towns as $townName) {
                    Town::firstOrCreate([
                        'district_id' => $district->id,
                        'clan_id' => $clan->id,
                        'name' => $townName,
                    ]);
                }
            }
        }
    }
}
