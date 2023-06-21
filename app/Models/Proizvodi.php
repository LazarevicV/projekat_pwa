<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proizvodi extends Model
{
    use HasFactory;

    public function kategorije()
    {
        return $this->belongsTo(Kategorije::class);
    }
}
