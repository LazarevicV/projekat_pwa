@extends('layout.main')

<style>
    .sredi_link_boju {
        color: black !important;

    }

    .sredi_link_boju:hover{
        color: #80ad39 !important;
    }
</style>

@section('content')
    <div class="container container-fluid d-flex my-5 flex-column align-items-center bg-light">
        <div class="d-flex flex-column col-12 col-md-7 my-3">
            <h1 class="fs40">Uloguj se</h1>
        </div>
        <form class="d-flex flex-column col-12 col-md-6" method="POST" action="{{route('loginPost')}}">
            <div class="checkout__input">
                <p>Korisnicko ime ili E-mail</p>
                <input type="text" id="imeIliMail" />
                <span class="text-danger" id="greskaImeIliMail"></span>
            </div>
            <div class="checkout__input">
                <p>Sifra</p>
                <input type="password" id="sifra" />
                <span class="text-danger" id="greskaSifra"></span>
            </div>
            <button type="submit" class="site-btn mb-3" id="btnLogovanje">
                Uloguj se
            </button>
            <div class="d-flex justify-content-center">
                <p class="mr-1">Nemate nalog?</p><a class="sredi_link_boju" href="{{ route('registracija') }}">Registrujte se</a>
            </div>
        </form>
    </div>
@endsection
