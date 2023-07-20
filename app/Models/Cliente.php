<?php

namespace App\Models;
use App\Models\Seguimento;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'cliente';
    protected $primarykey = 'id';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['nome','CNPJ','cel','email','contato','insEst','insMun',"seguimento_id"];

    public function sistema(){
        return $this->belongsTo(Seguimento::class);
    }
}
