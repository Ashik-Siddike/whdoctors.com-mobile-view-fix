<?php

namespace Database\Seeders;

use App\Models\SubPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sub_pages = array(
            array('id' => '1','name' => 'Abroad Living -1','slug' => 'abroad-living-1','content' => '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available</p>','page_id' => '11','created_at' => '2024-06-13 09:56:09','updated_at' => '2024-06-13 09:56:09'),

            array('id' => '2','name' => 'Abroad Living -2','slug' => 'abroad-living-2','content' => '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available</p>','page_id' => '11','created_at' => '2024-06-13 09:56:31','updated_at' => '2024-06-13 09:56:31'),
            


            array('id' => '3','name' => 'Fli BD Subpage -1','slug' => 'fli-bd-subpage-1','content' => '<h2>What is Lorem Ipsum?</h2>
            
            <p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            
            <h2>Why do we use it?</h2>
            
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>','page_id' => '10','created_at' => '2024-06-13 10:58:28','updated_at' => '2024-06-13 10:58:28'),


            array('id' => '4','name' => 'Subpage 1','slug' => 'subpage-1','content' => '<h2>What is Lorem Ipsum?</h2>
            <p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            
            <h2>Why do we use it?</h2>
            
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>','page_id' => '9','created_at' => '2024-06-13 11:10:07','updated_at' => '2024-06-13 11:10:07')
        );

        foreach ($sub_pages as $sub_page) {
            SubPage::create($sub_page);
        }
    }
}
