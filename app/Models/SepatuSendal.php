<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SepatuSendal extends Model
{
    use HasFactory;

    public function model(){
        return $this->belongsTo(ProdukModel::class);
    }

    public function ukuran(){
        return $this->belongsTo(Ukuran::class);
    }
}
