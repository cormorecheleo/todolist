@extends('default')
@section('content')

<div>
    <h1>TODOLIST n° {{$todolist->id}}</h1>
    <h5>{{$todolist->todos->count()}} todos disponibles</h5>
</div>

<div>
    name : {{$todolist->name}}
</div>

<div>
    <a class="btn btn-primary" href="/todos/{{$todolist->id}}/create">Create</a>
</div>
<table class="table">

    <thead>
        <tr>
            <th>Id</th>
            <th>Content</th>
            <th>Done</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($todolist->todos as $row)
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->content}}</td>
                <td>@if($row->done === 1)Done @endif</td>
                <td>{{$row->due_date}}</td>
            </tr>
        @endforeach
    </tbody>

</table>

@endsection