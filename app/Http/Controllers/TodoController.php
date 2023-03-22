<?php

namespace App\Http\Controllers;

use App\Events\TodoCreatedEvent;
use App\Models\Todo;
use App\Interfaces\TodoRepositoryInterface;
use App\Jobs\SendMailJob;
use App\Models\TodoList;
use App\Services\TodoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class TodoController extends Controller
{


    private $todoService;

    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $todolist = TodoList::find($id);
        return view('todos.create', compact('todolist'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $params = $request->all();
        $todo = new Todo();
        $todo->content = $params['content'];
        if (isset($params['done'])) {
            $todo->done = 1;
        }else{
            $todo->done = 0;
        }
        $todo->due_date = date("Y-m-d");
        $todo->todo_list_id = $params['id'];

        $this->todoService->save($todo);

        //TodoCreatedEvent::dispatch();
        //event(new TodoCreatedEvent($todo));
        SendMailJob::dispatch($todo);

        $redirect = "/todolist/".$params['id'];
        return redirect($redirect);
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        //
    }
}
