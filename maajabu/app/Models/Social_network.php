<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social_network extends Model
{
    use HasFactory;

    public function studio(){
        return $this->belongsTo(Studio::class);
    }
}
