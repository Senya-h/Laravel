@extends("todo.main")

@section("content")
<div class="container">
    <a href="/add/priority" class="btn btn-primary mb-2">Add Priority</a>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Priority</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($priorities as $priority)
            <tr>
                <td>{{$priority->name}}</td>
                <td>
                    <a href="/remove/priority/{{$priority->id}}" class="btn btn-danger">Remove</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
