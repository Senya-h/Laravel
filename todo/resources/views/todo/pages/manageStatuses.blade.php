@extends("todo.main")

@section("content")
<div class="container">

    <a href="/add/status" class="btn btn-primary mb-2">Add Status</a>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($statuses as $status)
            <tr>
                <td>{{$status->name}}</td>
                <td>
                    <a href="/remove/status/{{$status->id}}" class="btn btn-danger">Remove</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
