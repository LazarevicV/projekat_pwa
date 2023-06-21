@extends('layout.main')

@section('content')
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Categories</span>
                        </div>
                        <ul>
                            @foreach ($kategorije as $kategorija)
                                <li><a href="{{ route('products-by-category', $kategorija->id) }}">{{ $kategorija->naslov }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <img src="{{ asset('images/kategorije/slikaKategorije1.jpg') }}" alt=""> --}}

    <section class="categories overflow-hidden">
        <div class="container">
            <div class="section-title">
                <h2>Categories</h2>
            </div>
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach ($kategorije as $kategorija)
                        <div class='col-lg-3'>
                            <div class='categories__item set-bg'>
                                <img src="{{ asset($kategorija->src_slike) }}" alt=''>
                                {{-- {{$kategorija->src_slike}} --}}
                                <h5><a href="{{ route('products-by-category', $kategorija->id) }}">{{ $kategorija->naslov }}</a></h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <section class="featured spad">
        <div class="container">
            <div class="section-title">
                <h2>Featured Products</h2>
            </div>
            <div class="row">
                @foreach ($istaknuti as $proizvod)
                    <div class="col-lg-4">
                        <div class="featured__item">
                            <div class="featured__item__pic">
                                <img src="{{ $proizvod->src_slike }}" width="" style="margin-left: 6vh" alt="">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="{{ route('addToCart', $proizvod->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6 class="featured__item__title"><a href="{{route('product-page', $proizvod->id)}}">{{ $proizvod->naslov }}</a></h6>
                                <h5 class="featured__item__price">{{ $proizvod->cena }} RSD</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
