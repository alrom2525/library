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
        
        DB::table('menus')->insert([
            'parent_menu' => 0,
            'name' => 'Admin',
            'url' => 'admin',
            'order' => 1,
            'icon' => 'fa-cog',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('menus')->insert([
            'parent_menu' => 1,
            'name' => 'Rôles',
            'url' => 'admin/role',
            'order' => 1,
            'icon' => 'far fa-id-card',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        DB::table('menus')->insert([
            'parent_menu' => 1,
            'name' => 'Menus',
            'url' => 'admin/menu',
            'order' => 2,
            'icon' => 'fa-bars',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('menus')->insert([
            'parent_menu' => 1,
            'name' => 'Menus par rôles',
            'url' => 'admin/menu-role',
            'order' => 3,
            'icon' => 'fa-user-cog',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('menus')->insert([
            'parent_menu' => 1,
            'name' => 'Autorisations',
            'url' => 'admin/permission',
            'order' => 4,
            'icon' => 'fa-id-badge',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('menus')->insert([
            'parent_menu' => 1,
            'name' => 'Autorisations par Rôle',
            'url' => 'admin/permission-role',
            'order' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        DB::table('menus')->insert([
            'parent_menu' => 0,
            'name' => 'Utilisateurs',
            'url' => 'admin/user',
            'order' => 2,
            'icon' => 'fa-user',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        
    }
}
