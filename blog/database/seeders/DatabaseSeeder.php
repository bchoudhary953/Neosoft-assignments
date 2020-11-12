<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*DB::table('user1')->insert([
            'first_name' => 'Admin',
            'last_name' => 'admin',
            'email' => 'user123@admin.com',
            'password' => 'admin123',
            'status' => 'active',
            'role' => 'customer',
        ]);

        DB::table('role')->insert([
            'role_name' =>'super admin',
        ]);
        DB::table('role')->insert([
            'role_name' =>'admin',
        ]);
        DB::table('role')->insert([
            'role_name' =>'inventory manager',
        ]);
        DB::table('role')->insert([
            'role_name' =>'order manager',
        ]);
        DB::table('role')->insert([
            'role_name' =>'customer',
        ]);*/
        $this->call(LaratrustSeeder::class);
    }
}
