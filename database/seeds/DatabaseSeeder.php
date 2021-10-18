<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables(['permissions', 'roles', 'users', 'user_role']);
        $this->call(RolesTableSeeder::class);
        // $this->call(PermissionsTableSeeder::class);
        $this->call(AdminSeeder::class);
    }

    protected function truncateTables(array $tables){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach($tables as $table){
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
