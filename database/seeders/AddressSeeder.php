<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = array(
            array('id' => '1','text' => 'topnavber','full_address' => 'House: 44, Road: 11, Sector: 13, Uttara, Dhaka-1230','phone' => '+60195686867','email' => 'harun.sh96@gmail.com','working_hour' => '10 am to 5 pm','is_show_on_navbar' => '1','created_at' => '2023-11-18 14:55:12','updated_at' => '2024-03-02 22:51:57'),
            array('id' => '2','text' => 'PSRN, SERDANG PERDANA, TMN SERDANG PERDANA, SERI KEMBANGAN','full_address' => 'Perdana Selatan, Serdang, Selangor, Kuala Lumpur, Malaysia, 43300','phone' => '+60195686867','email' => 'harun.sh96@gmail.com','working_hour' => '10 am to 5 pm','is_show_on_navbar' => '0','created_at' => '2023-11-18 14:56:17','updated_at' => '2024-03-02 22:51:57'),
            array('id' => '3','text' => 'HEAD OFFICE : 01','full_address' => 'House: 44, Road: 11, Sector: 13, Uttara, Dhaka-1230','phone' => '+880 1676281410 +880 1731556529 (whatsApp)','email' => 'drmohsin.uddin.harun.sh96@gmail.com','working_hour' => 'Sunday - Thursday 9am - 5pm','is_show_on_navbar' => '0','created_at' => '2023-11-18 14:57:34','updated_at' => '2023-11-18 14:57:34'),
            array('id' => '4','text' => 'HEAD OFFICE : 02','full_address' => 'House: 44, Road: 11, Sector: 13, Uttara, Dhaka-1230','phone' => '+880 1676281410 +880 1731556529 (whatsApp)','email' => 'drmohsin.uddin.harun.sh96@gmail.com','working_hour' => 'Sunday - Thursday 9am - 5pm','is_show_on_navbar' => '0','created_at' => '2023-11-18 15:00:03','updated_at' => '2023-11-18 15:00:03'),
            array('id' => '5','text' => 'HEAD OFFICE : 03','full_address' => 'House: 44, Road: 11, Sector: 13, Uttara, Dhaka-1230','phone' => '+880 1676281410, +880 1731556529 (whatsApp)','email' => 'drmohsin.uddin.harun.sh96@gmail.com','working_hour' => 'Sunday - Thursday 9am - 5pm','is_show_on_navbar' => '0','created_at' => '2023-11-18 15:00:23','updated_at' => '2023-11-18 15:00:23'),
            array('id' => '6','text' => 'Chairman','full_address' => 'House-00, Road-00, Sector-00, Uttara, Dhaka-1230','phone' => '+880 1234567890','email' => 'mailaddress@gmail.com','working_hour' => 'none','is_show_on_navbar' => '0','created_at' => '2023-11-18 20:19:37','updated_at' => '2023-11-18 20:19:37'),
            array('id' => '7','text' => 'Managing Director','full_address' => 'House-00, Road-00, Sector-00, Uttara, Dhaka-1230','phone' => '+880 1234567890','email' => 'mailaddress@gmail.com','working_hour' => 'none','is_show_on_navbar' => '0','created_at' => '2023-11-18 20:20:56','updated_at' => '2023-11-18 20:20:56'),
            array('id' => '8','text' => 'Service Team 01','full_address' => 'House-00, Road-00, Sector-00, Uttara, Dhaka-1230','phone' => '+880 1234567890','email' => 'mailaddress@gmail.com','working_hour' => 'none','is_show_on_navbar' => '0','created_at' => '2023-11-18 20:22:52','updated_at' => '2023-11-18 20:22:52'),
            array('id' => '9','text' => 'Service Team 02','full_address' => 'House-00, Road-00, Sector-00, Uttara, Dhaka-1230','phone' => '+880 1234567890','email' => 'mailaddress@gmail.com','working_hour' => 'none','is_show_on_navbar' => '0','created_at' => '2023-11-18 20:23:21','updated_at' => '2023-11-18 20:23:21'),
            array('id' => '10','text' => 'Service Team 03','full_address' => 'House-00, Road-00, Sector-00, Uttara, Dhaka-1230','phone' => '+880 1234567890','email' => 'mailaddress@gmail.com','working_hour' => 'none','is_show_on_navbar' => '0','created_at' => '2023-11-18 20:23:54','updated_at' => '2023-11-18 20:23:54'),
            array('id' => '11','text' => 'Service Team 04','full_address' => 'House-00, Road-00, Sector-00, Uttara, Dhaka-1230','phone' => '+880 1234567890','email' => 'mailaddress@gmail.com','working_hour' => 'none','is_show_on_navbar' => '0','created_at' => '2023-11-18 20:24:21','updated_at' => '2023-11-18 20:24:21'),
            array('id' => '12','text' => 'Service Team 05','full_address' => 'House-00, Road-00, Sector-00, Uttara, Dhaka-1230','phone' => '+880 1234567890','email' => 'mailaddress@gmail.com','working_hour' => 'none','is_show_on_navbar' => '0','created_at' => '2023-11-18 20:24:47','updated_at' => '2023-11-18 20:24:47'),
            array('id' => '13','text' => 'Service Team 06','full_address' => 'House-00, Road-00, Sector-00, Uttara, Dhaka-1230','phone' => '+880 1234567890','email' => 'mailaddress@gmail.com','working_hour' => 'none','is_show_on_navbar' => '0','created_at' => '2023-11-18 20:25:32','updated_at' => '2023-11-18 20:25:32'),
            array('id' => '14','text' => 'Service Team 07','full_address' => 'House-00, Road-00, Sector-00, Uttara, Dhaka-1230','phone' => '+880 1234567890','email' => 'mailaddress@gmail.com','working_hour' => 'none','is_show_on_navbar' => '0','created_at' => '2023-11-18 20:26:10','updated_at' => '2023-11-18 20:26:10'),
            array('id' => '15','text' => 'Service Team 08','full_address' => 'House-00, Road-00, Sector-00, Uttara, Dhaka-1230','phone' => '+880 1234567890','email' => 'mailaddress@gmail.com','working_hour' => 'none','is_show_on_navbar' => '0','created_at' => '2023-11-18 20:26:36','updated_at' => '2023-11-18 21:20:58')
        );
        foreach($datas as $data)
        {
            Address::create($data);
        }
    }
}
