@extends("todo/main")

@section("content")
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Due date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Percent completed</th>
                    <th scope="col">Modified on</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($todos as $todo)
                    <tr>
                        <th scope="row">{{$todo->id}}</th>
                        <td>{{$todo->subject}}</td>
                        <td class="text-center">
                            <div class="rounded-pill" style="background-color: {{$todo->}}">
                                {{$todo->priority}}
                            </div>

                        </td>
                        <td>{{$todo->dueDate}}</td>
                        <td>{{$todo->status}}</td>
                        <td>{{$todo->percent}}</td>
                        <td>{{$todo->updated_at}}</td>
                        <td>
                            <a href="/edit/todo/{{$todo->id}}" class="btn btn-primary">Edit</a>
                            <a href="/remove/todo/{{$todo->id}}" class="btn btn-danger">Remove</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
