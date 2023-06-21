<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Kategorije;
use App\Models\Proizvodi;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        return view('pocetna', ['title' => 'Homepage', 'kategorije' => Kategorije::all(), 'istaknuti' => Proizvodi::inRandomOrder()->take(3)->get()]);
    }

    public function contactPage()
    {
        return view('contact', ['title' => 'Contact Us']);
    }

    public function productsPage()
    {
        return view('all-products', ['title' => 'Products', 'kategorije' => Kategorije::all(), 'proizvodi' => Proizvodi::all()]);
    }

    public function productsByCategory($id)
    {
        $kategorija = Kategorije::find($id);
        return view('all-products', ['title' => $kategorija->naslov, 'kategorije' => Kategorije::all(), 'proizvodi' => $kategorija->proizvodi]);
    }

    public function addToCart(Request $request, $productId)
    {
        $cart = session()->get('cart', []);

        $cart[] = $productId;

        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function cartPage()
    {
        $cart = session()->get('cart', []);

        $proizvodi = Proizvodi::find($cart);

        return view('cart', ['title' => 'Cart', 'proizvodi' => $proizvodi]);
    }

    public function removeFromCart(Request $request, $productId)
    {
        $cart = session()->get('cart', []);

        $index = array_search($productId, $cart);

        if ($index !== false) {
            unset($cart[$index]);
            $cart = array_values($cart);
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }

    public function singleProduct($id)
    {
        $proizvod = Proizvodi::find($id);
        return view('single-product', ['title' => $proizvod->naslov, 'proizvod' => $proizvod]);
    }
}
