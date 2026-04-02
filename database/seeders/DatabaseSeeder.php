<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(SubPageSeeder::class);
        $this->call(PageContentSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(BlogCategorySeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(ClientReviewSeeder::class);
        $this->call(UniversitySeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(AgentSeeder::class);
    }
}
