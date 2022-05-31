<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PostCode;

class PostCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $postCodes = json_decode(file_get_contents(storage_path() . "/geoLocations/postcode.json"), true);
        foreach($postCodes as $take)
        {
            foreach($take as $item)
            {
                $postCode = new PostCode();
                $postCode->division_id = $item['division_id'];
                $postCode->district_id = $item['district_id'];
                $postCode->upazila = $item['upazila'];
                $postCode->postOffice = $item['postOffice'];
                $postCode->postCode = $item['postCode'];

                $postCode->save();
            }


        }
    }
}
