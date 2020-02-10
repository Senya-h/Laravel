@extends("skelbimai/main")

@section("content")
    <main>
        <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(/images/hero_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center justify-content-center text-center">

                    <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                        <div class="row justify-content-center mt-5">
                            <div class="col-md-8 text-center">
                                <h1>Skelbimo redagavimas</h1>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>


        <div class="site-section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-5"  data-aos="fade">

                        <form method="POST" action='/save-edited-ad' class="p-5 bg-white">
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
                                <input type="hidden" name="id" value="{{$ad->id}}">
                            <div class="row form-group">
                                <div class="col-12 mb-3 mb-md-0">
                                    <label class="text-black" for="category">Kategorija</label>
                                    <select class="custom-select" name="categoryId" id="category">
                                        <option disabled> -- Kategorija -- </option>
                                        @foreach($categories as $category)
                                            @if($ad->categoryId === $category->id)
                                                <option selected value="{{$category->id}}">{{$category->name}}</option>
                                            @else
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-12 mb-3 mb-md-0">
                                    <label class="text-black" for="name">Pavadinimas</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{$ad->name}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-12 mb-3 mb-md-0">
                                    <label class="text-black" for="description">Aprašymas</label>
                                    <textarea name="description" id="description" class="form-control" rows="10">{{$ad->description}}</textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-12 mb-3 mb-md-0">
                                    <label class="text-black" for="price">Kaina</label>
                                    <input value="{{$ad->price}}" type="number" id="price" name="price" class="form-control" min="0" step="any">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-12 mb-3 mb-md-0">
                                    <label class="text-black" for="image">Nuotrauka</label>
                                    <input type="file" id="image" name="img" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-12">
                                    <label class="text-black" for="location">Miestas</label>
                                    <input value="{{$ad->location}}" type="text" id="location" name="location" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-12">
                                    <label class="text-black" for="email">El. paštas</label>
                                    <input value="{{$ad->email}}" type="email" id="email" name="email" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-12">
                                    <label class="text-black" for="phone">Telefono numeris</label>
                                    <input value="{{$ad->phone}}" type="number" id="phone" name="phone" class="form-control">
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col-12">
                                    <input type="submit" value="Patvirtinti pakeitimus" class="btn btn-primary py-2 px-4 text-white">
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>
@stop
