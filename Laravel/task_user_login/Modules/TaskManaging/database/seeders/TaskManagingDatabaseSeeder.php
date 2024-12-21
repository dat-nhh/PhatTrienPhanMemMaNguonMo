<?php

namespace Modules\TaskManaging\Database\Seeders;

use Illuminate\Database\Seeder;

class TaskManagingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([TaskTableSeeder::class]);
    }
}
