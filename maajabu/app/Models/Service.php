<?php

namespace App\Models;

use App\Models\Tarif;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    public function tarif(){
        return $this->belongsTo(Tarif::class);
    }

    public function reservations(){
        return $this->belongsToMany(Reservation::class);
    }
}
