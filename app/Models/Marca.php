<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable=['nome'];
    use HasFactory;
    protected function produto(){
        return $this->hasMany('\App\Models\Produto', 'marca_id');
    }
}
