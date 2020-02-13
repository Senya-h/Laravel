@extends("skelbimai/main")

@section("content")
    <main>
        <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center justify-content-center text-center">

                    <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                        <div class="row justify-content-center mt-5">
                            <div class="col-md-8 text-center">
                                <h1>Ads Listings</h1>
                                <p class="mb-0">Choose product you want</p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">

                        <div class="row">
                            @foreach($ads as $ad)
                                <div class="col-lg-6">
                                    <div class="d-block d-md-flex listing vertical">
                                        <a href="/ad/{{$ad->id}}" class="img d-block" style="background-image: url({{asset('storage/' . $ad->img)}})"></a>
                                        <div class="lh-content">
                                            <span class="category">{{$ad->category}}</span>
                                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                                            <h3><a href="/ad/{{$ad->id}}">{{$ad->title}}</a></h3>
                                            <address>{{$ad->location}}</address>
                                            <p class="mb-0">
                                                <span class="icon-star text-warning"></span>
                                                <span class="icon-star text-warning"></span>
                                                <span class="icon-star text-warning"></span>
                                                <span class="icon-star text-warning"></span>
                                                <span class="icon-star text-secondary"></span>
                                                <span class="review">(3 Reviews)</span>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            @endforeach

                        </div>

                        <div class="col-12 mt-5 d-flex justify-content-center">
                            <div class="">
                                {{$ads->onEachSide(3)->links()}}
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3 ml-auto">

                        <div class="mb-5">
                            <h3 class="h5 text-black mb-3">Filters</h3>
                            <form action="#" method="post">
                                <div class="form-group">
                                    <input type="text" placeholder="What are you looking for?" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="select-wrap">
                                        <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                        <select class="form-control" name="" id="">
                                            <option value="">All Categories</option>
                                            <option value="" selected="">Real Estate</option>
                                            <option value="">Books &amp;  Magazines</option>
                                            <option value="">Furniture</option>
                                            <option value="">Electronics</option>
                                            <option value="">Cars &amp; Vehicles</option>
                                            <option value="">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- select-wrap, .wrap-icon -->
                                    <div class="wrap-icon">
                                        <span class="icon icon-room"></span>
                                        <input type="text" placeholder="Location" class="form-control">
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="mb-5">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <p>Radius around selected destination</p>
                                </div>
                                <div class="form-group">
                                    <input type="range" min="0" max="100" value="20" data-rangeslider>
                                </div>
                            </form>
                        </div>

                        <div class="mb-5">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <p>Category 'Real Estate' is selected</p>
                                    <p>More filters</p>
                                </div>
                                <div class="form-group">
                                    <ul class="list-unstyled">
                                        <li>
                                            <label for="option1">
                                                <input type="checkbox" id="option1">
                                                Residential
                                            </label>
                                        </li>
                                        <li>
                                            <label for="option2">
                                                <input type="checkbox" id="option2">
                                                Commercial
                                            </label>
                                        </li>
                                        <li>
                                            <label for="option3">
                                                <input type="checkbox" id="option3">
                                                Industrial
                                            </label>
                                        </li>
                                        <li>
                                            <label for="option4">
                                                <input type="checkbox" id="option4">
                                                Land
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>

                        <div class="mb-5">
                            <h3 class="h6 mb-3">More Info</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti voluptatem placeat facilis, reprehenderit eius officiis.</p>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </main>
@stop
