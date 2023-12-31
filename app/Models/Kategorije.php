<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategorije extends Model
{
    use HasFactory;

    public function proizvodi()
    {
        return $this->hasMany(Proizvodi::class);
    }
}
