@extends("skelbimai/main")

@section("content")
    <main>
        <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(/images/hero_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center justify-content-center text-center">

                    <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
                        <div class="row justify-content-center mt-5">
                            <div class="col-md-8 text-center">
                                <h1>Skelbimų valdymas</h1>
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
                        <a href="/add-ad" class="btn btn-primary">Naujas skelbimas</a>
                        <div class="table-responsive my-3">
                            <table class="table table-striped table-hover">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Skelbimas</th>
                                    <th scope="col">Kaina</th>
                                    <th scope="col">Veiksmai</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ads as $ad)
                                    <tr>
                                        <td>{{$ad->name}}</td>
                                        <td>{{$ad->price}}</td>
                                        <td>
                                            <a href="#" class="btn btn-primary">Redaguoti</a>
                                            <a href="/delete/ad/{{$ad->id}}"class="btn btn-danger">Šalinti</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop

