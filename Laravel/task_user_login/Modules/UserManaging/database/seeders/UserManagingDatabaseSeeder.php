<?php

namespace Modules\UserManaging\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\UserManaging\Models\MyUser;

class UserManagingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);
        MyUser::create([
            'username' => 'admin',
            'password' => Hash::make('admin')
        ]);
        MyUser::create([
            'username' => 'dat',
            'password' => Hash::make('dat12345')
        ]);
    }
}
