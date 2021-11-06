<?php

namespace App\Models;

use App\Models\Tarif;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','img_url','tarif_id'];

    public function tarif(){
        return $this->belongsTo(Tarif::class);
    }

    public function reservations(){
        return $this->belongsToMany(Reservation::class);
    }
}
