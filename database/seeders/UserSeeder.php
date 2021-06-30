<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::where('is_admin', 1)->delete();

        User::create([
            "name" => "Admin",
            "email" => "xinhit98@gmail.com",
            "email_verified_at" => null,
            'phone' => '0339698977',
            'address' => '123 Đại lộ Lê Lợi, TP Thanh Hoá, Tỉnh Thanh Hoá',
            "current_team_id" => 1,
            "profile_photo_path" => null,
            "is_admin" => 1,
            "password" => bcrypt('12345678'),
        ]);
    }
}
