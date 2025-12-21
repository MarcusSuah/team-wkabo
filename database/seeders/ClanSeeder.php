<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\District;

class ClanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        $data = [
            'Zorzor District' => ['Kpadeh Clan', 'Fissebu Clan', 'Buyema Clan'],
            'Salayea District' => ['Vavalah Clan', 'Gbarlin Clan', 'Palama Clan'],
        ];

        foreach ($data as $districtName => $clans) {
            $district = District::firstOrCreate([
                'name' => $districtName
            ]);

            foreach ($clans as $clanName) {
                $district->clans()->firstOrCreate([
                    'name' => $clanName
                ]);
            }
        }
    }
}
