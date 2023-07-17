<?php

namespace App\Models;
use App\Models\Produto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producao extends Model
{
    use HasFactory;
    protected $table ='producao';
    protected $primarykey = 'id';
    protected $fillable = ['cliente_id','produto_id','opNum','qt','dataEntrega','obs'];
    public function sistema(){
        return $this->belongsTo(Produto::class);
    }

}
