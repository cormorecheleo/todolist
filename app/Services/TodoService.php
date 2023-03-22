<?php

namespace App\Services;

use App\Models\Todo;
use App\Repositories\TodoRepository;


class TodoService
{
    private $repo;
    public function __construct(TodoRepository $repo)
    {
        $this->repo = $repo;
    }

    public function save(Todo $todo){
        $this->repo->save($todo);
    }
}
