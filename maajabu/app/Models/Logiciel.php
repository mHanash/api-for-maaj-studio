<?php

namespace App\Models;

use App\Models\Engineer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Logiciel extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public function engineers(){
        return $this->belongsToMany(Engineer::class);
    }
}
