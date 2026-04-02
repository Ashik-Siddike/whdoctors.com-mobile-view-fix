<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = array(
            array('id' => '1','title' => 'Blog Category-1 ..........','slug' => 'service-category-1','created_at' => '2024-01-08 13:39:51','updated_at' => '2024-06-11 22:10:11'),
            array('id' => '2','title' => 'Writing and Formating','slug' => 'service-category-2','created_at' => '2024-01-08 13:39:51','updated_at' => '2024-03-02 23:36:58'),
            array('id' => '3','title' => 'Thesis Consulting','slug' => 'service-category-3','created_at' => '2024-01-08 13:39:51','updated_at' => '2024-03-02 23:37:34'),
            array('id' => '4','title' => 'Service Category-4','slug' => 'service-category-4','created_at' => '2024-01-08 13:39:51','updated_at' => '2024-01-08 13:39:51'),
            array('id' => '5','title' => 'Service Category-5','slug' => 'service-category-5','created_at' => '2024-01-08 13:39:51','updated_at' => '2024-01-08 13:39:51'),
            array('id' => '6','title' => 'Service Category-6','slug' => 'service-category-6','created_at' => '2024-01-08 13:39:51','updated_at' => '2024-01-08 13:39:51'),
            array('id' => '8','title' => 'New blog 6','slug' => 'new-blog-6','created_at' => '2024-05-20 22:41:40','updated_at' => '2024-05-20 22:41:40'),
            array('id' => '9','title' => 'Service 7','slug' => 'service-7','created_at' => '2024-05-20 22:42:55','updated_at' => '2024-05-20 22:42:55'),
            array('id' => '10','title' => 'Service 8','slug' => 'service-8','created_at' => '2024-05-20 22:43:25','updated_at' => '2024-05-20 22:43:25')
        );

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
