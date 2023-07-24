<?php

namespace App\Models;
use App\Models\Cliente;
use Illuminate\Database\Eloquent\SoftDeletes; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguimento extends Model
{
    use HasFactory;
    protected $table = 'seguimento';
    protected $primarykey = 'id';
    protected $fillable = ['nome'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function clientes(){
        return $this->hasMany(Cliente::class);
    }
}
