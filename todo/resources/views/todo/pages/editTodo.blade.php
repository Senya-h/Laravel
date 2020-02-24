@extends("todo/main")

@section("content")
    <div class="container">

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="/edit/todo/{{$todo->id}}">
            @csrf
            <div class="form-group">
                <label for="subject" class="text-dark">Subject</label>
                <input value="{{$todo->subject}}" type="text" name="subject" class="form-control" id="subject" placeholder="Enter subject">
            </div>
            <div class="form-group">
                <label for="priority">Priority</label>
                <select id="priority" name="priority" class="custom-select">
                    @foreach($priorities as $priority)
                        <option value="{{$priority->name}}" {{$priority->name == $todo->priority? "selected": ""}} >{{$priority->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="date">Due date</label>
                <input value="{{$todo->dueDate}}" type="date" name="dueDate" class="form-control" id="date">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="custom-select">
                    @foreach($statuses as $status)
                        <option value="{{$status->name}}" {{$status->name == $todo->status? "selected": ""}} >{{$status->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="priority">Percent completed</label>
                <input value="{{$todo->percent}}" type="number" name="percent" min="0" max="100" step="1" class="form-control" id="exampleInputPassword1" placeholder="Percents">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
