<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = array(
            array('id' => '1','name' => 'CSE IN Bachelor','slug' => 'course-name-1','description' => '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate</p>','created_at' => '2024-01-08 13:39:51','updated_at' => '2024-03-04 23:07:27'),
            array('id' => '2','name' => 'Course Name-2','slug' => 'course-name-2','description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate','created_at' => '2024-01-08 13:39:51','updated_at' => '2024-01-08 13:39:51'),
            array('id' => '3','name' => 'Course Name-3','slug' => 'course-name-3','description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate','created_at' => '2024-01-08 13:39:51','updated_at' => '2024-01-08 13:39:51'),
            array('id' => '4','name' => 'Course Name-4','slug' => 'course-name-4','description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate','created_at' => '2024-01-08 13:39:51','updated_at' => '2024-01-08 13:39:51'),
            array('id' => '5','name' => 'Course Name-5','slug' => 'course-name-5','description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate','created_at' => '2024-01-08 13:39:51','updated_at' => '2024-01-08 13:39:51'),
            array('id' => '6','name' => 'Course Name-6','slug' => 'course-name-6','description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate','created_at' => '2024-01-08 13:39:51','updated_at' => '2024-01-08 13:39:51'),
            array('id' => '7','name' => 'Course Name-7','slug' => 'course-name-7','description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate','created_at' => '2024-01-08 13:39:51','updated_at' => '2024-01-08 13:39:51'),
            array('id' => '8','name' => 'Course Name-8','slug' => 'course-name-8','description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate','created_at' => '2024-01-08 13:39:51','updated_at' => '2024-01-08 13:39:51')
        );

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
