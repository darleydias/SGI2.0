<?php

namespace App\Models;
use App\Models\Pessoa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setor extends Model
{
    use HasFactory;
    protected $table = 'setor';
    protected $fillable = ['nome'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function funcionarios(){
        return $this->hasMany(Pessoa::class);
    }
}
