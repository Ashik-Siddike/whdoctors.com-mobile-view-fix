<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Alamgir Kabir Roni',
            'email' => 'kabir.swe@gmail.com',
            'password' => bcrypt('111Ron35177@'),
            'is_employee' => '0'
        ]);
        $user2 = User::create([
            'name' => 'G.M. Zesan',
            'email' => 'zesan.bitscol7767@gmail.com',
            'password' => bcrypt('12345678aA'),
            'is_employee' => '0'
        ]);
        $permissions = Permission::pluck('id','name')->all();
        $user->assignRole('superadmin');
        $user2->assignRole('superadmin');

        //superadmin
        $adminRole = Role::findByName('superadmin');
        $adminRole->givePermissionTo($permissions);

        $admin = User::create([
            'name' => 'Harun Shahriar',
            'email' => 'harun.sh96@gmail.com',
            'password' => bcrypt('admin@12345'),
            'is_employee' => '1',
        ]);
        $admin->assignRole('admin');


        //admin
        $adminRole = Role::findByName('admin');
        $permissionsadmin = Permission::whereNotIn('name', ['page-list', 'page-create', 'page-edit', 'page-delete', 'page-content-create', 'page-content-delete'])->pluck('id','name')->all();
        $adminRole->givePermissionTo($permissionsadmin);


        $users = array(
            array('id' => '4','name' => 'MR. JHON','image' => 'upload/user-image/20231119063309.jpg','designation' => 'Chairman','email' => 'mailaddress@gmail.com','facebook_link' => 'https://www.facebook.com/','twitter_link' => 'https://twitter.com/','instagram_link' => 'https://www.instagram.com/','linkdin_link' => 'https://bd.linkedin.com/','phone_no' => '+880 1234567890','address' => 'House-00, Road-00, Sector-00, Uttara, Dhaka-1230','description' => NULL,'email_verified_at' => NULL,'password' => '$2y$12$FVwKLHefZZxady6dV0E64ODhVwM6PJgtYF6xcpL1h1yaTpqqxE6eW', 'is_employee' => '0' ,'is_show_home' => '1','is_active' => '1','remember_token' => NULL,'created_at' => '2023-11-19 12:33:09','updated_at' => '2023-11-19 12:33:09'),
            array('id' => '6','name' => 'Service Team 01','image' => 'upload/user-image/20231119064757.jpg','designation' => 'Marketing Office','email' => 'searviceteam01gmail.com','facebook_link' => 'https://www.facebook.com/','twitter_link' => 'https://twitter.com/','instagram_link' => 'https://www.instagram.com/','linkdin_link' => 'https://bd.linkedin.com/','phone_no' => '+880 1234567811','address' => 'House-00, Road-00, Sector-00, Uttara, Dhaka-1230','description' => NULL,'email_verified_at' => NULL,'password' => '$2y$12$AMGtNwEqfAsSu2aBtxyT7Oy.h/Y7iB0pTBX/T0WoeRZh8vUcNiM3i', 'is_employee' => '0' ,'is_show_home' => '1','is_active' => '1','remember_token' => NULL,'created_at' => '2023-11-19 12:47:57','updated_at' => '2023-11-19 12:47:57'),
            array('id' => '14','name' => 'Aminul','image' => 'upload/user-image/20240122170450.jpg','designation' => NULL,'email' => 'aminunivdhaka@gmail.com','facebook_link' => NULL,'twitter_link' => NULL,'instagram_link' => NULL,'linkdin_link' => NULL,'phone_no' => '01914924193','address' => NULL,'description' => NULL,'email_verified_at' => NULL,'password' => '$2y$12$RxDLG1/j/B4iJQJAIOoLZueViqiuddPmW9bpmStykTfPAkJrH8I.S', 'is_employee' => '0' ,'is_show_home' => '1','is_active' => '1','remember_token' => NULL,'created_at' => '2024-01-22 23:04:50','updated_at' => '2024-01-22 23:04:50'),
            array('id' => '15','name' => 'Amin','image' => NULL,'designation' => NULL,'email' => 'amin@gmail.com','facebook_link' => NULL,'twitter_link' => NULL,'instagram_link' => NULL,'linkdin_link' => NULL,'phone_no' => '0195686868','address' => NULL,'description' => NULL,'email_verified_at' => NULL,'password' => '$2y$12$pvzKgvQqMbyHK/VupoU4uemLHQY.QP3Dhg.G8thdU0k38yOFQq1w.', 'is_employee' => '0' ,'is_show_home' => '1','is_active' => '1','remember_token' => NULL,'created_at' => '2024-01-22 23:13:03','updated_at' => '2024-01-22 23:13:03'),
            array('id' => '16','name' => 'Rashid','image' => NULL,'designation' => 'd','email' => 'whdoctors@com','facebook_link' => NULL,'twitter_link' => NULL,'instagram_link' => NULL,'linkdin_link' => NULL,'phone_no' => '1096686867','address' => NULL,'description' => NULL,'email_verified_at' => NULL,'password' => '$2y$12$9vgw9fH1PuFro0Q0uoMpp.OrbiMdeZ1ArAESSY0XG1zUWanUJQ2na', 'is_employee' => '0' ,'is_show_home' => '1','is_active' => '1','remember_token' => NULL,'created_at' => '2024-01-30 00:06:16','updated_at' => '2024-01-30 00:06:16'),
            array('id' => '17','name' => 'Md Harun Rashid','image' => 'upload/user-image/20240220170716.jpg','designation' => 'Managing Director','email' => 'whdoctorslab@gmail.com','facebook_link' => 'https://www.facebook.com/harun.rashid.56884761/','twitter_link' => NULL,'instagram_link' => NULL,'linkdin_link' => NULL,'phone_no' => '+60195686867','address' => 'A-0318, PSRN, SERDANG PERDANA, TMN SERDANG PERDANA, SERI KEMBANGAN','description' => NULL,'email_verified_at' => NULL,'password' => '$2y$12$5cM6cUg1Bun5PU8oS/WSGO1uSZ2KORVJ7eQ3Ixfdc/5gjqIVAAWzS', 'is_employee' => '1' ,'is_show_home' => '1','is_active' => '1','remember_token' => NULL,'created_at' => '2024-02-20 23:07:16','updated_at' => '2024-02-20 23:07:16'),
            array('id' => '18','name' => 'Aminul Islam','image' => 'upload/user-image/20240220172715.jpg','designation' => 'Country Director','email' => 'Amin.sh96@gmail.com','facebook_link' => NULL,'twitter_link' => NULL,'instagram_link' => NULL,'linkdin_link' => NULL,'phone_no' => '0199999999999999','address' => NULL,'description' => NULL,'email_verified_at' => NULL,'password' => '$2y$12$p5xmzqqCxO/Ya5dN1lMqhOmtag9p1XAGq4I3qrmKfNgLgBPbEfKyi', 'is_employee' => '1' ,'is_show_home' => '1','is_active' => '1','remember_token' => NULL,'created_at' => '2024-02-20 23:27:15','updated_at' => '2024-02-20 23:27:15'),
            array('id' => '19','name' => 'WEI Li','image' => 'upload/user-image/20240303164932.jpg','designation' => 'director','email' => 'harun.sh99@gmail.com','facebook_link' => NULL,'twitter_link' => NULL,'instagram_link' => NULL,'linkdin_link' => NULL,'phone_no' => '+60195686869','address' => 'A-0318, PSRN, SERDANG PERDANA, TMN SERDANG PERDANA, SERI KEMBANGAN','description' => NULL,'email_verified_at' => NULL,'password' => '$2y$12$Nln8fkYAmW/br17evsEzVuogQy/JqPjpvgt6W8r1uqdOOtXNGLTCO', 'is_employee' => '0' ,'is_show_home' => '1','is_active' => '1','remember_token' => NULL,'created_at' => '2024-03-03 22:49:32','updated_at' => '2024-03-03 22:49:32'),
            array('id' => '20','name' => 'VIcky wong','image' => 'upload/user-image/20240303165208.jpg','designation' => 'Director','email' => 'harun.sh90@gmail.com','facebook_link' => NULL,'twitter_link' => NULL,'instagram_link' => NULL,'linkdin_link' => NULL,'phone_no' => '+601956868690','address' => 'A-0318, PSRN, SERDANG PERDANA, TMN SERDANG PERDANA, SERI KEMBANGAN','description' => NULL,'email_verified_at' => NULL,'password' => '$2y$12$iAC1em8lVZD8hWUhXZoRyexw9h/pb5/Oa51jV1HqZcp8YuYE/GE46', 'is_employee' => '1' ,'is_show_home' => '1','is_active' => '1','remember_token' => NULL,'created_at' => '2024-03-03 22:52:08','updated_at' => '2024-03-03 22:52:08'),
            array('id' => '21','name' => 'Aminul Islam','image' => 'upload/user-image/20240511145843.jpg','designation' => 'Director','email' => 'aminsebd@gmail.com','facebook_link' => NULL,'twitter_link' => NULL,'instagram_link' => NULL,'linkdin_link' => NULL,'phone_no' => '01914924194','address' => NULL,'description' => NULL,'email_verified_at' => NULL,'password' => '$2y$12$V1z8bO10Nq7MVjCm33lYhu9TbyMqlIQiBnAOYTK6HhcC5NPT2iPgi', 'is_employee' => '0' ,'is_show_home' => '1','is_active' => '1','remember_token' => NULL,'created_at' => '2024-05-11 20:58:43','updated_at' => '2024-05-11 21:13:46'),
            array('id' => '22','name' => 'Faruk Hossain','image' => NULL,'designation' => NULL,'email' => 'farukphy@gmail.com','facebook_link' => NULL,'twitter_link' => NULL,'instagram_link' => NULL,'linkdin_link' => NULL,'phone_no' => NULL,'address' => NULL,'description' => NULL,'email_verified_at' => NULL,'password' => '$2y$12$NSkWhcdZbAO.79qjoQCXkuC2469CFnwjDPsbPfgPHGwv9ispMNHUO', 'is_employee' => '0' ,'is_show_home' => '1','is_active' => '1','remember_token' => NULL,'created_at' => '2024-05-11 21:05:32','updated_at' => '2024-05-11 21:05:32'),
            array('id' => '23','name' => 'Rakib','image' => NULL,'designation' => 'Developer','email' => 'rrakib.office@gmail.com','facebook_link' => NULL,'twitter_link' => NULL,'instagram_link' => NULL,'linkdin_link' => NULL,'phone_no' => '01730080683','address' => NULL,'description' => NULL,'email_verified_at' => NULL,'password' => '$2y$12$o8NxFglbWUwfzmu6YYhvx.MdNTzjxxX7b6.ucNNaW82fQxK5kVWte', 'is_employee' => '0' ,'is_show_home' => '1','is_active' => '1','remember_token' => NULL,'created_at' => '2024-05-19 13:19:35','updated_at' => '2024-05-19 13:22:09'),
            array('id' => '24','name' => 'Test 20 May','image' => NULL,'designation' => 'test 20 m','email' => 'test.sh199@gmail.com','facebook_link' => NULL,'twitter_link' => NULL,'instagram_link' => NULL,'linkdin_link' => NULL,'phone_no' => '0174939391','address' => NULL,'description' => NULL,'email_verified_at' => NULL,'password' => '$2y$12$2OuNQDTXQdEFETiP.EfIsOP1ToYbjJ0BZ5MbQSfbqQBj9J8azv.6q', 'is_employee' => '1' ,'is_show_home' => '1','is_active' => '1','remember_token' => NULL,'created_at' => '2024-05-20 22:54:51','updated_at' => '2024-05-20 22:54:51')
        );
          

        foreach($users as $user)
        {
            $new_user = User::create($user);
            $new_user->assignRole('admin');
        }
    }
}
