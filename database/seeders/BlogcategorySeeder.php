<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blog_categories = array(
            array('id' => '1','title' => 'Blog Category-1','slug' => 'blog-category-1','created_at' => '2024-01-08 13:39:51','updated_at' => '2024-01-08 13:39:51'),
            array('id' => '2','title' => 'Blog Category-2','slug' => 'blog-category-2','created_at' => '2024-01-08 13:39:51','updated_at' => '2024-01-08 13:39:51'),
            array('id' => '3','title' => 'Blog Category-3','slug' => 'blog-category-3','created_at' => '2024-01-08 13:39:51','updated_at' => '2024-01-08 13:39:51'),
            array('id' => '4','title' => 'Blog Category-4','slug' => 'blog-category-4','created_at' => '2024-01-08 13:39:51','updated_at' => '2024-01-08 13:39:51'),
            array('id' => '5','title' => 'Blog Category-5','slug' => 'blog-category-5','created_at' => '2024-01-08 13:39:51','updated_at' => '2024-01-08 13:39:51')
        );

        foreach ($blog_categories as $blog_category) {
            BlogCategory::create($blog_category);
        }
    }
}
