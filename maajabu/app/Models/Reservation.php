<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    public function user(){
        $this->belongsTo(User::class);
    }

    public function services(){
        $this->belongsToMany(Service::class);
    }
}
