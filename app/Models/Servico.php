<?php

namespace App\Models;
use App\Models\Trabalho;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;
    protected $table="servico";
    protected $fillabble=['nome','dtInicio','dtFim'];
    
    public function trabalhos(){
        return $this->hasMany(Trabalho::class);
    }
}
