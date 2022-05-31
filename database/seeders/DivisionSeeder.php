<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Division;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $division = json_decode(file_get_contents(storage_path() . "/geoLocations/division.json"), true);
        foreach($division as $take)
        {
            foreach($take as $item)
            {
                $division = new Division();
                $division->name = $item['name'];
                $division->bn_name = $item['bn_name'];
                $division->lat = $item['lat'];
                $division->long = $item['long'];
                $division->save();
            }

        }

    }
}
