<?php

namespace App\Models;

use App\Models\Phone;
use App\Models\Social_network;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Studio extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','adresse','url_maps'];

    public function social_networks(){
        $this->hasMany(Social_network::class);
    }

    public function phones(){
        return $this->hasMany(Phone::class);
    }
}
