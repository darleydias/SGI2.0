<?php

namespace App\Models;
use App\Models\Servico;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabalho extends Model
{
    use HasFactory;
    protected $table="trabalho";
    protected $fillable=['id_executor','id_servico','tempoInicio','tempoFim','trabalhoPausa'];
    public function sistema(){
        return $this->belongsTo(Servico::class);
    }
}
