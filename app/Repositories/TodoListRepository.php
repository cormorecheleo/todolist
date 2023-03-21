<?php

namespace App\Repositories;

use App\Interfaces\TodoListRepositoryInterface;
use App\Models\TodoList;
use Illuminate\Database\Eloquent\Model;

class TodoListRepository implements TodoListRepositoryInterface{

    

    public function findAll(){
        return TodoList::all();
    }
    public function save(Model $model){
        $model->save();
    }
    public function findById(int $id){
        return TodoList::where('id',$id)->get()->first();   
    }

    
}
