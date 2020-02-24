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
        <form method="POST" action="/add/status">
            @csrf
            <div class="form-group">
                <label for="subject" class="text-dark">Status</label>
                <input type="text" name="status" class="form-control" id="subject" placeholder="Enter status">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
