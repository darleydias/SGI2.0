<?php

namespace App\Models;
use App\Models\Produto;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProduto extends Model
{
    use HasFactory;
    protected $table = 'tipo_produto';
    protected $primarykey = 'id';
    protected $fillable = ['nome'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
        
    public function produtos(){
        return $this->hasMany(Produto::class);
    }
    
}
