<?php

namespace App\Models;

use App\Models\Artist;
use App\Models\Engineer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Work extends Model
{
    use HasFactory;

    public function artist(){
        $this->belongsTo(Artist::class);
    }

    public function engineer(){
        $this->belongsTo(Engineer::class);
    }

    public function categories(){
        $this->belongsToMany(Category::class);
    }
}
