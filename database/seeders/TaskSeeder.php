<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Models\TaskModel;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(TaskModel $task)
    {
        $task->create([
            'title'=>'Criar 1',
            'done'=>'0',
            'id_user'=>'2',
        ]);

        $task->create([
            'title'=>'Criar 2',
            'done'=>'0',
            'id_user'=>'2',
        ]);

        $task->create([
            'title'=>'Criar 3',
            'done'=>'0',
            'id_user'=>'2',
        ]);
    }
}
