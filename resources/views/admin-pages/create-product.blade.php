@extends('layout.main')

@section('content')
    <div class="container container-fluid d-flex my-5 flex-column align-items-center bg-light">
        <div class="d-flex flex-column col-12 col-md-7 my-3">
            <h1 class="fs40">Dodavanje proizvoda</h1>
        </div>
        <form class="d-flex flex-column col-12 col-md-6" method="POST" enctype="multipart/form-data"
            action="{{ route('admin-kreiraj-proizvod') }}">
            @csrf
            <div class="checkout__input">
                <p>Naslov</p>
                <input type="text" name="naslov" id="naslovProizvoda" required/>
                <span class="text-danger" id="greskaNaslov"></span>
            </div>
            <div
                class="checkout__input d-flex flex-row justify-content-around text-center flex-column flex-sm-row align-items-center">
                <div class="mb-4">
                    <p>Kategorija</p>
                    <select name="kategorija" id="ddlKategorija" required>
                        @foreach ($kategorije as $kategorija)
                            <option value="{{ $kategorija->id }}">{{ $kategorija->naslov }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="checkout__input">
                <p>Cena</p>
                <input type="number" name="cena" id="cenaProizvoda" min="0" required/>
                <span class="text-danger" id="greskaCena"></span>
            </div>
            <div class="checkout__input">
                <p>Kratak opis</p>
                <textarea type="text" name="opis" id="kOpis" required></textarea>
                <span class="text-danger" id="greskaKOpis"></span>
            </div>
            <div class="checkout__input ">
                <p>Slike</p>
                <input type="file" name="slika" name="fileSlika" id="fileSlika" class="border-0" required/>
                <span class="text-danger" id="greskaDOpis"></span>
            </div>
            <button type="submit" class="site-btn mb-3" id="btnDodaj">
                Dodaj
            </button>
        </form>
    </div>
@endsection
