<?php

namespace App\Models;
use App\Models\Producao;
use App\Models\TipoProduto;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'produto';
    protected $primarykey = 'id';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['nome','desc','cod','tipoProduto_id','peso','unid'];
    public function producoes(){
        return $this->hasMany(Producao::class);
    }
    public function sistema(){
        return $this->belongsTo(TipoProduto::class);
    }
}
