<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => User::ROLE_SUPER_MAN,
                'guard_name' => 'web',
                'title' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => User::ROLE_SUPER_ADMIN,
                'guard_name' => 'web',
                'title' => 'ผู้ดูแลระบบสูงสุด',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => User::ROLE_ADMIN,
                'guard_name' => 'web',
                'title' => 'เจ้าหน้าที่ธุรการ / แอดมิน',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('model_has_roles')->insert([
            [
                'role_id' => 1,
                'model_type' => User::class,
                'model_id' => 1,

            ],
            [
                'role_id' => 1,
                'model_type' => User::class,
                'model_id' => 2,

            ],
            [
                'role_id' => 1,
                'model_type' => User::class,
                'model_id' => 3,
            ],
        ]);
    }
}
