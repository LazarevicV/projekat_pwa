<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // admin user
        $user1 = new User();
        $user1->first_name = 'Vukadin';
        $user1->last_name = 'Lazarevic';
        $user1->email = 'vukadinlazarevic@gmail.com';
        $user1->roll = 1;
        $user1->password = Hash::make('sifrasifra');
        $user1->save();

        // regular user
        $user2 = new User();
        $user2->first_name = 'Pera';
        $user2->last_name = 'Peric';
        $user2->email = 'peraperic@gmail.com';
        $user2->roll = 2;
        $user2->password = Hash::make('sifrasifra123');
        $user2->save();
    }
}
