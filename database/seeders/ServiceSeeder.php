<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = array(
            array('id' => '1','category_id' => '10','title' => 'All kind of Academic writing','subtitle' => 'Thesis, Specific Chapters, Research Article, SSCI, SCI, Web of Science, Q1, Q2, Q3, Q4, Scopus Index and Normal Gogoole Scoler','description' => '<p>We are supporting all kind of academic writing, such as thesis, projects, Research proposals, Specific Chapters, Research articles, SSCI, SCI, Web of Science, Q1, Q2, Q3, Q4, Scopus Index and Normal Google Scoler in any discipline&nbsp;</p>','created_at' => '2024-01-08 13:39:51','updated_at' => '2024-06-11 22:09:41'),
            array('id' => '2','category_id' => '2','title' => 'Service-2','subtitle' => 'Service-Subtitle-2','description' => '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy&nbsp;is available.</p>','created_at' => '2024-01-08 13:39:51','updated_at' => '2024-01-08 13:39:51'),
            array('id' => '3','category_id' => '3','title' => 'Service-3','subtitle' => 'Service-Subtitle-3','description' => '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy&nbsp;is available.</p>','created_at' => '2024-01-08 13:39:51','updated_at' => '2024-01-08 13:39:51'),
            array('id' => '4','category_id' => '4','title' => 'Service-4','subtitle' => 'Service-Subtitle-4','description' => '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy&nbsp;is available.</p>','created_at' => '2024-01-08 13:39:51','updated_at' => '2024-01-08 13:39:51'),
            array('id' => '5','category_id' => '5','title' => 'Service-5','subtitle' => 'Service-Subtitle-5','description' => '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy&nbsp;is available.</p>','created_at' => '2024-01-08 13:39:51','updated_at' => '2024-01-08 13:39:51'),
            array('id' => '6','category_id' => '6','title' => 'Service-6','subtitle' => 'Service-Subtitle-6','description' => '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy&nbsp;is available.</p>','created_at' => '2024-01-08 13:39:51','updated_at' => '2024-01-08 13:39:51'),
            array('id' => '8','category_id' => '2','title' => 'Service-8','subtitle' => 'Service-Subtitle-8','description' => '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy&nbsp;is available.</p>','created_at' => '2024-01-08 13:39:51','updated_at' => '2024-01-08 13:39:51'),
            array('id' => '9','category_id' => '2','title' => 'aaa','subtitle' => 'aa','description' => '<p>aaa</p>','created_at' => '2024-01-08 22:31:40','updated_at' => '2024-01-08 22:31:40')
        );

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
