<?php

namespace Database\Seeders;

use App\Models\Agent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agents = array(
            array('id' => '1','name' => 'Agent - 1','email' => 'agent1@hgh.hc','n_id' => '75678868876678','phone' => '6064863912','commission_rate' => '7.00','address' => 'Uttara - dhaka','image' => NULL,'id_card_front_image' => NULL,'id_card_back_image' => NULL,'date_of_birth' => '2024-04-06','details' => 'yZuNpIGo4H','created_at' => '2024-04-06 08:38:14','updated_at' => '2024-04-06 08:38:14'),
            array('id' => '2','name' => 'Agent - 2','email' => 'agent2@gmail.com','n_id' => '220240042222','phone' => '01258486985','commission_rate' => '8.00','address' => 'Banani, Dhaka','image' => NULL,'id_card_front_image' => NULL,'id_card_back_image' => NULL,'date_of_birth' => '2001-01-01','details' => 'details here','created_at' => '2024-07-01 07:02:33','updated_at' => '2024-07-01 07:02:33')
        );

        foreach ($agents as $agent) {
            Agent::create($agent);
        }
    }
}
