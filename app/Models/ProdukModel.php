<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
    ];

    public function sepatuSendal(){
        return $this->hasMany(SepatuSendal::class);
    }

}
