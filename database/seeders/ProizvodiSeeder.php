<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proizvodi;

class ProizvodiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proizvod1 = new Proizvodi();

        $proizvod1->naslov = 'Brokoli';
        $proizvod1->opis = "Brokoli je povrce zelene boje";
        $proizvod1->kategorije_id = 3;
        $proizvod1->cena = 200;
        $proizvod1->src_slike = 'storage/images/store_images/cSzL97phTM5dvl4e6ebh9oExmT0LezxE8XwOYB1x.jpg';
        $proizvod1->save();

        $proizvod2 = new Proizvodi();
        $proizvod2->naslov = 'Jagoda';
        $proizvod2->opis = "Jagoda je crveno voce";
        $proizvod2->kategorije_id = 2;
        $proizvod2->cena = 350;
        $proizvod2->src_slike = 'storage/images/store_images/ZZlexReqp6eCPhgQehLw0hCyIRloT9bvv5KbvYrM.jpg';
        $proizvod2->save();
    }
}
