<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminTableSeeder extends Seeder
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
                    'id' => 1,
                    'username' => 'weeradach.ch',
                    'name' => 'Admin Compat1',
                    'email' => 'weeradach.ch@gmail.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('password'),
                    'remember_token' => Str::random(10),
                ],
                [
                    'id' => 2,
                    'username' => 'y.pornwisa',
                    'name' => 'Admin Compat2',
                    'email' => 'y.pornwisa@gmail.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('password'),
                    'remember_token' => Str::random(10),
                ],
                [
                    'id' => 3,
                    'username' => 'g.porawet',
                    'name' => 'Admin Compat2',
                    'email' => 'porawet.kunlaphruetmetha@compattana.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('password'),
                    'remember_token' => Str::random(10),
                ],
                [
                   'id' => 4,
                    'username' => 'nutdanai.c',
                    'name' => 'Admin Compat3',
                    'email' => 'nutdanai.c@gmail.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('password'),
                    'remember_token' => Str::random(10),
                ]
            ]
        );
    }
}
