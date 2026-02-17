<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesAddSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = new Role();
		$role->name = 'super-admin';
		$role->is_active = 1;
		$role->save();

        $role = new Role();
		$role->name = 'admin';
		$role->is_active = 1;
		$role->save();

        $role = new Role();
		$role->name = 'user';
		$role->is_active = 1;
		$role->save();
    }
}
