<?php

namespace Modules\TaskManaging\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\TaskManaging\Models\Task;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1;$i<=30;$i++){
            $task = new Task;
            $task->name = 'Task '.$i;
            $task->save();
        }
    }
}
