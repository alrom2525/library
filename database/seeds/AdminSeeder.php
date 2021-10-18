<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'admin@system.local',
            'name' => 'Administrator',
            'password' => bcrypt('4dm1n1str4t0r'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        DB::table('user_role')->insert([
            'role_id' => 1,
            'user_id' => 1,
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'email' => 'editor@system.local',
            'name' => 'Editor',
            'password' => bcrypt('3d1t0rl0c4l'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('user_role')->insert([
            'role_id' => 2,
            'user_id' => 2,
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
