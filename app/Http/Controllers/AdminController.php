<?php

namespace App\Http\Controllers;

use App\Models\Kategorije;
use App\Models\Proizvodi;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function productsPage()
    {
        return view('admin-pages.all-products', ['title' => 'All products', 'proizvodi' => Proizvodi::all()]);
    }

    public function createProductPage()
    {
        return view('admin-pages.create-product', ['title' => 'Create product', 'kategorije' => Kategorije::all()]);
    }

    public function createProduct(Request $request)
    {

        $product = new Proizvodi();

        $product->naslov = $request->post('naslov');
        $product->opis = $request->post('opis');
        $product->cena = $request->post('cena');
        $product->kategorije_id = $request->post('kategorija');

        $file = $request->file('slika');

        if ($file) {
            $path = $file->store('public/images/store_images');

            $modifiedPath = str_replace('public/', 'storage/', $path);

            $product->src_slike = $modifiedPath;
        }

        $product->save();

        return redirect(route('admin-proizvodi'));
    }

    public function deleteProduct($id)
    {
        $product = Proizvodi::find($id);

        $product->delete();

        return redirect(route('admin-proizvodi'));
    }

    public function editProduct($id)
    {
        return view('admin-pages.edit-product', ['title' => 'Edit product', 'product' => Proizvodi::find($id), 'kategorije' => Kategorije::all()]);
    }

    public function updateProduct($id, Request $request)
    {
        $product = Proizvodi::find($id);
        $product->naslov = request()->post('naslov');
        $product->opis = request()->post('opis');
        $product->cena = request()->post('cena');
        $product->kategorije_id = request()->post('kategorija');

        if ($request->has('remove_picture')) {
            $product->src_slike = null;
        }

        if ($request->hasFile('slika')) {
            $file = $request->file('slika');

            if ($file) {
                $path = $file->store('public/images/store_images');

                $modifiedPath = str_replace('public/', 'storage/', $path);

                $product->src_slike = $modifiedPath;
            }
        }

        $product->save();

        return redirect(route('admin-proizvodi'));
    }

    public function allUsers()
    {
        return view('admin-pages.all-users', ['title' => 'All users', 'users' => User::all()]);
    }

    public function deleteUser($id) {
        $user = User::find($id);
        $user->delete();

        return redirect(route('all-users'));
    }
}
