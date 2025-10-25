<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionDistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = json_decode(file_get_contents(public_path('regions.json')), true);

        foreach ($data['regions'] as $regionData) {
            $region = Region::create([
                'id' => $regionData['id'],
                'name' => $regionData['name']
            ]);
        }

        foreach ($data['districts'] as $districtData) {
            District::create([
                'id' => $districtData['id'],
                'region_id' => $districtData['region_id'],
                'name' => $districtData['name']
            ]);
        }
    }
}
