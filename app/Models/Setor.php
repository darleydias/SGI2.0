<?php

namespace App\Models;
use App\Models\Pessoa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    use HasFactory;
    protected $table = 'setor';
    protected $fillable = ['nome'];

    public function funcionarios(){
        return $this->hasMany(Pessoa::class);
    }
}
