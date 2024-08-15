<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelTas extends Model
{
    use HasFactory;

    public function tas(){
        return $this->hasMany(Tas::class);
    }
}
