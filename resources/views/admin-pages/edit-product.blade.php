@extends('layout.main')

@section('content')
    <div class="container container-fluid d-flex my-5 flex-column align-items-center bg-light">
        <div class="d-flex flex-column col-12 col-md-7 my-3">
            <h1 class="fs40">Dodavanje proizvoda</h1>
        </div>
        <form class="d-flex flex-column col-12 col-md-6" method="POST" enctype="multipart/form-data"
            action="{{ route('updateProduct', $product->id) }}">
            @csrf
            <div class="checkout__input">
                <p>Naslov</p>
                <input type="text" value="{{ $product->naslov }}" name="naslov" id="naslovProizvoda" required/>
                <span class="text-danger" id="greskaNaslov"></span>
            </div>
            <div
                class="checkout__input d-flex flex-row justify-content-around text-center flex-column flex-sm-row align-items-center">
                <div class="mb-4">
                    <p>Kategorija</p>
                    <select name="kategorija" id="ddlKategorija" required>
                        @foreach ($kategorije as $kategorija)
                            @if ($kategorija->id == $product->kategorije_id)
                                <option value="{{ $kategorija->id }}" selected>{{ $kategorija->naslov }}</option>
                                @continue
                            @endif
                            <option value="{{ $kategorija->id }}">{{ $kategorija->naslov }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="checkout__input">
                <p>Cena</p>
                <input type="number" value="{{ $product->cena }}" name="cena" id="cenaProizvoda" min="0" required/>
                <span class="text-danger" id="greskaCena"></span>
            </div>
            <div class="checkout__input">
                <p>Kratak opis</p>
                <textarea type="text" name="opis" id="kOpis" required>{{ $product->opis }}</textarea>
                <span class="text-danger" id="greskaKOpis"></span>
            </div>
            <div class="checkout__input">
                <label for="removePictureCheckbox">Remove current picture</label>
                <input type="checkbox" name="remove_picture" required id="removePictureCheckbox" style="width: 20px!important;" />
            </div>
            <div class="checkout__input ">
                <p>Slike</p>
                <input type="file" value="{{ $product->src_slike }}" required name="slika" name="fileSlika"
                    id="fileSlika" class="border-0" />
                <span class="text-danger" id="greskaDOpis"></span>
            </div>
            <button type="submit" class="site-btn mb-3" id="btnDodaj">
                Update
            </button>
        </form>
    </div>
@endsection
