<?php

namespace App\Http\Controllers;

use App\Interfaces\TodoListRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\TodoList;

class TodoListController extends Controller
{

    private $todolistRepository;

    public function __construct(TodoListRepositoryInterface $todolistRepository)
    {
        $this->todolistRepository = $todolistRepository;
    }

    public function index(){

        $todolists = $this->todolistRepository->findAll();
        
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
            $this->todolistRepository->save($todolist);

            return redirect()->route('todolist.index');
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
