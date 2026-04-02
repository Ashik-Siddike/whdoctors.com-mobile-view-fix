<?php

namespace Database\Seeders;

use App\Models\ClientReview;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'John Doe',
                'designation' => 'Software Engineer',
                'review' => 'The customer is very important, the customer will be followed by the customer. In the Internet, the fear of life, the chocolate layer itself. For the children, there is no time, nor are the vehicles convenient for arrows.',
                'image' => 'upload/client-review/20231228123836.jpg',
                'status' => 1,
            ],
            [
                'name' => 'Jane Doe',
                'designation' => 'CTO',
                'review' => 'The customer is very important, the customer will be followed by the customer. In the Internet, the fear of life, the chocolate layer itself. For the children, there is no time, nor are the vehicles convenient for arrows.',
                'image' => 'upload/client-review/20231228124056.jpg',
                'status' => 1,
            ],
            [
                'name' => 'John Smith',
                'designation' => 'COO',
                'review' => 'The customer is very important, the customer will be followed by the customer. In the Internet, the fear of life, the chocolate layer itself. For the children, there is no time, nor are the vehicles convenient for arrows.',
                'image' => 'upload/client-review/20231228124104.jpg',
                'status' => 1,
            ],
            [
                'name' => 'Jane Smith',
                'designation' => 'CFO',
                'review' => 'The customer is very important, the customer will be followed by the customer. In the Internet, the fear of life, the chocolate layer itself. For the children, there is no time, nor are the vehicles convenient for arrows.',
                'image' => NULL,
                'status' => 0,
            ],
        ];

        foreach ($data as $item) {
            ClientReview::create($item);
        }
    }
}
