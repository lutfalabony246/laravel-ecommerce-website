<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Upazila;

class UpazilaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $upazila = json_decode(file_get_contents(storage_path() . "/geoLocations/upazilla.json"), true);
        // dd($district);
            foreach($upazila as $take)
            {
                foreach($take as $item)
                {
                    $upazilla = new Upazila();
                    $upazilla->district_id = $item['district_id'];
                    $upazilla->name = $item['name'];
                    $upazilla->bn_name = $item['bn_name'];
                    $upazilla->save();
                }


            }
    }
}
