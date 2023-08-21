<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Movimentacao extends Model
{
    use HasFactory;
    protected $table='movimentacao';
    protected $fillable=['quant','id_produto'];
    
    public function produto(){ 
        return $this->belongsToMany(Produto::class,'produto');
    }
}
