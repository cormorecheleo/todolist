@extends('default')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
    <form action="{{route('todolist.create')}}" method="POST">
        @csrf
        <input type="text" name="name"/>
        <input type="submit" value="OK" class="btn btn-primary"/>
    </form>

@endsection