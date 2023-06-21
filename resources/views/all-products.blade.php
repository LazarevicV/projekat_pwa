@extends('layout.main')

@section('content')
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Categories</h4>
                            <ul>
                                @foreach ($kategorije as $kategorija)
                                    <li><a href="{{route('products-by-category', $kategorija->id)}}">{{ $kategorija->naslov }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="row">
                        @if (count($proizvodi) == 0)
                            <div class="col-lg-12">
                                <div class="alert alert-danger" role="alert">
                                    No products found!
                                </div>
                            </div>
                        @endif
                        @foreach ($proizvodi as $proizvod)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg">
                                        <img src="{{ asset($proizvod->src_slike) }}" alt="">

                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="{{ route('addToCart', $proizvod->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="{{route('product-page', $proizvod->id)}}">{{ $proizvod->naslov }}</a></h6>
                                        <h5>{{ $proizvod->cena }} RSD</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
