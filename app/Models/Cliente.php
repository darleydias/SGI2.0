<?php

namespace App\Models;
use App\Models\Seguimento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'cliente';
    protected $primarykey = 'id';
    protected $fillable = ['nome','CNPJ','cel','email','contato','insEst','insMun',"seguimento_id","cliente_ativo"];

    public function sistema(){
        return $this->belongsTo(Seguimento::class);
    }
}
