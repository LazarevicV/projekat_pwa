@extends('layout.main')

@section('content')
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <div>
                            <h3 class="mb-5">Proizvodi</h3>
                            <a href="{{ route('sacuvajProizvod') }}"><button type="submit" class="site-btn mb-3"
                                    id="btnDodajProizvod">
                                    Dodaj proizvod
                                </button></a>
                        </div>
                        @foreach ($proizvodi as $proizvod)
                            <div id="divJedanRedKorpa"
                                class="glavniDiv d-flex flex-column justify-content-between align-items-center flex-md-row">
                                <div>
                                    <img class="mb-2 malaSlika" src="{{asset($proizvod->src_slike)}}" alt="" />
                                    {{-- {{$proizvod->src_slike}} --}}
                                </div>
                                <div class="fix-duzina-naziv">
                                    <h5 class="mb-2">{{$proizvod->naslov}}</h5>
                                </div>
                                <div class="fix-duzina-naziv">
                                    <h5 class="mb-2">{{$proizvod->opis}}</h5>
                                </div>
                                <div class="fix-duzina-naziv">
                                    <h5 class="mb-2">{{$proizvod->cena}}</h5>
                                </div>
                                <div class="fix-duzina-naziv">
                                    <h5 class="mb-2">{{$proizvod->kategorije->naslov}}</h5>
                                </div>
                                <div class="fix-duzina-naziv">
                                    <h5 class="mb-2"></h5>
                                </div>
                                <div class="fix-duzina-naziv">
                                    <h5 class="mb-2"> </h5>
                                </div>
                                <div class="shopingcartitem__close mb-2">
                                    <a href="{{route('edit-product', $proizvod->id)}}" class="btn btn-primary">Update</a>
                                </div>
                                <div class="shopingcartitem__close mb-2">
                                    <a href="{{route('delete-product', $proizvod->id)}}" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
