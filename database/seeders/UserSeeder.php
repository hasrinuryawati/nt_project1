<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'              => "Melissa Roman",
                'email'             => "melissa.roman@randomemail.com",
                'email_verified_at' => now(),
                'password'          => Hash::make('12345678'), // password
                'remember_token'    => Str::random(15),
            ],
            [
                'name'              => "Molly Hayes",
                'email'             => "molly.hayes@randomemail.com",
                'email_verified_at' => now(),
                'password'          => Hash::make('12345678'), // password
                'remember_token'    => Str::random(15),
            ],
            [
                'name'              => "Kim Boyd",
                'email'             => "kim_boyd@randomemail.com",
                'email_verified_at' => now(),
                'password'          => Hash::make('12345678'), // password
                'remember_token'    => Str::random(15),
            ],
        ]);
    }
}
