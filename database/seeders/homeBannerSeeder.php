<?php

namespace Database\Seeders;

use App\Models\aboutModel;
use App\Models\homeBannerModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class homeBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'title' => 'I will give you Best Product in the shortest time.',
            'bio_description' => "I'm a Rasalina based product design & visual designer focused on crafting clean & user‑friendly experiences",
            'video_url' => "https://www.youtube.com/watch?v=XHOmBV4js_E"
        ];

        homeBannerModel::create($data);
    }
}
