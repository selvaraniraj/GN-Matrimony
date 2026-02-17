<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersAddSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          //Super Admin
          $user = new User();
          $user->name = 'Super Admin';
          $user->username = 'matrymony_ruler';
          $user->email = 'matrymonyruler@gmail.com';
          $user->password = bcrypt('Ruler@123');
          $user->is_active = 1;
          $user->role_id = 1;
          $user->last_login = \Carbon\Carbon::now();
          $user->save();


          //Admin
          $user = new User();
          $user->name = 'Admin';
          $user->username = 'matrymony_admin';
          $user->email = 'matrymonyadmin@gmail.com';
          $user->password = bcrypt('Ruler@123');
          $user->is_active = 1;
          $user->role_id = 2;
          $user->last_login = \Carbon\Carbon::now();
          $user->save();

          //User
          $user = new User();
          $user->name = 'user';
          $user->username = 'user';
          $user->email = 'matrymony_user@gmail.com';
          $user->password = bcrypt('Ruler@123');
          $user->is_active = 1;
          $user->role_id = 3;
          $user->last_login = \Carbon\Carbon::now();
          $user->save();
    }
}
