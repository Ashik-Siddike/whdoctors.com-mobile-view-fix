<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = array(
            array('id' => '1','title' => 'Home','slug' => 'home-page', 'is_not_deleteable' => 1, 'created_at' => '2023-11-08 12:03:56','updated_at' => '2023-11-08 12:03:56'),
            array('id' => '2','title' => 'About','slug' => 'about-us-page', 'is_not_deleteable' => 1, 'created_at' => '2023-11-08 12:04:28','updated_at' => '2023-11-08 12:04:28'),
            array('id' => '3','title' => 'Service','slug' => 'service-page', 'is_not_deleteable' => 1, 'created_at' => '2023-11-08 12:04:54','updated_at' => '2023-11-08 12:04:54'),
            array('id' => '4','title' => 'Abroad Study','slug' => 'study-abroad-page', 'is_not_deleteable' => 1, 'created_at' => '2023-11-08 12:05:15','updated_at' => '2023-11-08 12:05:15'),
            array('id' => '8','title' => 'Common','slug' => 'common-page', 'is_not_deleteable' => 1, 'created_at' => '2023-11-08 12:06:18','updated_at' => '2023-11-08 12:06:18'),
            array('id' => '9','title' => 'Conference','slug' => 'conference-page', 'is_not_deleteable' => 1, 'created_at' => '2023-11-08 12:06:35','updated_at' => '2023-11-08 12:06:35'),
            array('id' => '10','title' => 'Fly BD','slug' => 'fly-bd-page', 'is_not_deleteable' => 1, 'created_at' => '2023-11-08 12:06:35','updated_at' => '2023-11-08 12:06:35'),
            array('id' => '11','title' => 'Abroad Living','slug' => 'abroad-living-page', 'is_not_deleteable' => 1, 'created_at' => '2023-11-08 12:06:35','updated_at' => '2023-11-08 12:06:35'),

        );
        foreach($datas as $data)
        {
            Page::create($data);
        }

    }
}
