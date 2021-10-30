<?php

namespace App\Models;

use App\Models\Work;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Engineer extends Model
{
    use HasFactory;

    protected $fillable = ['name','year_experience','img_url'];

    public function works(){
        return $this->hasMany(Work::class);
    }
}
