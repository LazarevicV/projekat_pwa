<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategorije;

class KategorijeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategorija1 = new Kategorije();

        $kategorija1->naslov = 'Sveze meso';
        $kategorija1->src_slike = 'images/kategorije/slikaKategorije1.jpg';
        $kategorija1->save();

        $kategorija2 = new Kategorije();

        $kategorija2->naslov = 'Voce';
        $kategorija2->src_slike = 'images/kategorije/slikaKategorije2.jpg';
        $kategorija2->save();

        $kategorija3 = new Kategorije();

        $kategorija3->naslov = 'Povrce';
        $kategorija3->src_slike = 'images/kategorije/slikaKategorije3.jpg';
        $kategorija3->save();

        $kategorija4 = new Kategorije();

        $kategorija4->naslov = 'Suseno voce, povrce';
        $kategorija4->src_slike = 'images/kategorije/slikaKategorije4.jpg';
        $kategorija4->save();

        $kategorija5 = new Kategorije();

        $kategorija5->naslov = 'Jaja i mlecni proizvodi';
        $kategorija5->src_slike = 'images/kategorije/slikaKategorije5.jpg';
        $kategorija5->save();
    }
}
