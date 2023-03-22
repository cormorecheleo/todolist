@extends('default')
@section('content')

<h1>Ajout d'une TODO a la TODOLIST n° {{$todolist->id}}</h1>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{route('todos.store', ["id" => $todolist->id])}}"  method="POST">
    @csrf
     <input class="form form-control" type="text" name="content">
     <input type="checkbox" name="done">

     <button class="btn btn-info" type="submit">ok</button>

</form>



@endsection