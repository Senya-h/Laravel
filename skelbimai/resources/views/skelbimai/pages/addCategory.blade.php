@extends("skelbimai/main")

@section("content")
<main>
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
                    <div class="row justify-content-center mt-5">
                        <div class="col-md-8 text-center">
                            <h1>Kategorijos pridėjimas</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-4"  data-aos="fade">
                    <form class="p-5 bg-white" method="POST" action="/store-category">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @csrf
                        <div class="form-group">
                            <div class="col-12 mb-3 mb-md-0">
                                <label class="text-black" for="name">Kategorija</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <input type="submit" value="Pridėti kategoriją" class="btn btn-primary py-2 px-4 text-white">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</main>
@stop
