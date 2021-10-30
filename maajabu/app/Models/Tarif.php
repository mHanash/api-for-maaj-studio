<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tarif extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','price'];

    public function services(){
        return $this->hasMany(Service::class);
    }
}
