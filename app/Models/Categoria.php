<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable=['descricao'];
    
    use HasFactory;
    public function produtos(){
        return $this->belongsToMany('App\Models\Produto', 'categoria_produto');
      }
}
