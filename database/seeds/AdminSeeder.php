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
            'user_id' => 1
        ]);

        DB::table('users')->insert([
            'email' => 'editor@system.local',
            'name' => 'Editor',
            'password' => bcrypt('3d1t0rl0c4l'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('user_role')->insert([
            'role_id' => 2,
            'user_id' => 2
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
            'url' => 'admin/menurole',
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
            'url' => 'admin/permissionrole',
            'order' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        DB::table('menus')->insert([
            'parent_menu' => 1,
            'name' => 'Utilisateurs',
            'url' => 'admin/user',
            'order' => 6,
            'icon' => 'fa-user',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        DB::table('menus')->insert([
            'parent_menu' => 0,
            'name' => 'Books',
            'url' => 'library/book',
            'order' => 2,
            'icon' => 'fa-book',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('menu_role')->insert([
            'role_id' => 1,
            'menu_id' => 1
        ]);
        
        DB::table('menu_role')->insert([
            'role_id' => 1,
            'menu_id' => 2
        ]);

        DB::table('menu_role')->insert([
            'role_id' => 1,
            'menu_id' => 3
        ]);

        DB::table('menu_role')->insert([
            'role_id' => 1,
            'menu_id' => 4
        ]);

        DB::table('menu_role')->insert([
            'role_id' => 1,
            'menu_id' => 5
        ]);

        DB::table('menu_role')->insert([
            'role_id' => 1,
            'menu_id' => 6
        ]);

        DB::table('menu_role')->insert([
            'role_id' => 1,
            'menu_id' => 7
        ]);

        DB::table('menu_role')->insert([
            'role_id' => 1,
            'menu_id' => 8
        ]);

        DB::table('permissions')->insert([
            'name' => 'Create books',
            'slug' => 'create-books',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'Edit books',
            'slug' => 'edit-books',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'Delete books',
            'slug' => 'delete-books',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('permissions')->insert([
            'name' => 'View books',
            'slug' => 'view-books',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        DB::table('permission_role')->insert([
            'role_id' => 1,
            'permission_id' => 1
        ]);

        DB::table('permission_role')->insert([
            'role_id' => 1,
            'permission_id' => 2
        ]);

        DB::table('permission_role')->insert([
            'role_id' => 1,
            'permission_id' => 3
        ]);

        DB::table('permission_role')->insert([
            'role_id' => 1,
            'permission_id' => 4
        ]);
    }
}
