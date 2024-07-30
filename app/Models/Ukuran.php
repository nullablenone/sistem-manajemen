<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukuran extends Model
{
    use HasFactory;

    public function sepatuSendal(){
        return $this->hasMany(SepatuSendal::class);
    }
}
