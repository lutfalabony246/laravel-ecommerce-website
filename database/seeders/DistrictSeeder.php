<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\District;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $district = json_decode(file_get_contents(storage_path() . "/geoLocations/district.json"), true);
        // dd($district);
            foreach($district as $take)
            {
                foreach($take as $item)
                {
                    $district = new District();
                    $district->division_id = $item['division_id'];
                    $district->name = $item['name'];
                    $district->bn_name = $item['bn_name'];
                    $district->lat = $item['lat'];
                    $district->long = $item['long'];
                    $district->save();
                }


            }

    }
}
