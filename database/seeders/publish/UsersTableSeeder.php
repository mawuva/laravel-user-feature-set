<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Add Users
         *
         */
        echo "\e[32mSeeding:\e[0m UserFeatureSet - DefaultUsersTableSeeder\r\n";

        if (config('user-feature-set.user.model')::where('email', '=', 'admin@admin.com')->first() === null) {
            config('user-feature-set.user.model')::create([
                'name'     => 'Admin',
                'email'    => 'admin@admin.com',
                'email_verified_at'    => now(),
                'password' => bcrypt('password'),
            ]);

            echo "\e[32mSeeding:\e[0m UserFeatureSet - DefaultUsersTableSeeder - User:admin@admin.com\r\n";
        }

        if (config('user-feature-set.user.model')::where('email', '=', 'user@user.com')->first() === null) {
            config('user-feature-set.user.model')::create([
                'name'     => 'User',
                'email'    => 'user@user.com',
                'email_verified_at'    => now(),
                'password' => bcrypt('password'),
            ]);

            echo "\e[32mSeeding:\e[0m UserFeatureSet - DefaultUsersTableSeeder - User:user@user.com.com\r\n";
        }
    }
}