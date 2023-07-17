<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Setor;

class Pessoa extends Model
{
    use HasFactory;
    protected $table = "pessoa";
    protected $fillable = ['nomeCompleto','sexo','dtNasc','CPF','email','celular','id_setor'];
    public function setor(){
        return $this->belongsTo(Setor::class);
    }
}
