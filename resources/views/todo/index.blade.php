@extends('default')
@section('content')
    
<div>
    <table class="table">

        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todolists as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>
                </tr>
            @endforeach
        </tbody>
    
    </table>
</div>

<div>
    <form action="/todos/create" method="GET">
        <input type="submit" value="Creer" class="btn btn-primary"/>
    </form>
</div>


@endsection()