<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Setor;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pessoa extends Model
{
    use HasFactory;
    protected $table = "pessoa";
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['nomeCompleto','sexo','dtNasc','CPF','email','celular','id_setor'];
    public function setor(){
        return $this->belongsTo(Setor::class);
    }
}
