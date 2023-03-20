<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;

class TodoListController extends Controller
{
    public function index(){

        $todolists = TodoList::all();
        
        return view('todo.index', compact('todolists'));
    }

    public function create(Request $request){
        if($request->isMethod('get')){
            return view('todo.create');
        }else if($request->isMethod('post')){
            $params = $request->all();
            $r = $request->validate([
                'name' => 'required'
            ]);

            

            $todolist = new TodoList();
            $todolist->name = $params['name'];
            $todolist->save();

            return redirect()->route('todolist.index');
        }
    }

    public function store(Request $request){
        $params = $request->all();

        $todolist = new TodoList();
        $todolist->name = $params['name'];
        $todolist->save();

        if($todolist->id){
            return view('todo.index', compact('todolist'));
        }else{
            return "Error create todo";
        }
    }

    public function edit($id){
        $todolist = TodoList::where('id', $id)->get();

        return view('todo.edit', compact('todolist'));
    }

    public function update(Request $request, $id){
        $params = $request->all();
        $todolist = TodoList::find($id);
        $todolist-> $params['name'];
        $todolist->update();

        return view('todo.index');
    }

    public function delete($id){
        $todolist = TodoList::find($id);
        $todolist->delete();
    }

}
