@extends("skelbimai/main")

@section("content")
<main>
    @include("skelbimai/_partials/featuredAds")

    @include("skelbimai/_partials/popularCategories")

    @include("skelbimai/_partials/trendingToday")

    @include("skelbimai/_partials/testimonials")

    @include("skelbimai/_partials/ourBlog")

    @include("skelbimai/_partials/newsletter")
</main>
@stop
