<?php

namespace Database\Seeders;

use App\Models\TodoList;
use App\Models\Todo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TodoList::factory(3)->create()->each(function ($todoList) {
            Todo::factory(5)->create(['todo_list_id'=>$todoList->id])->each(function ($todo) use($todoList) {
                $todoList->todos()->save($todo);
            });
       });
    }
}
