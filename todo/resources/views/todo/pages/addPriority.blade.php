@extends("todo/main")

@section("content")
    <div class="container mt-5 ">

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="/add/priority">
            @csrf
            <div class="form-group">
                <label for="subject" class="text-dark">Priority</label>
                <input type="text" name="priority" class="form-control" id="subject" placeholder="Enter priority">
                <input type="color" name="color">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
