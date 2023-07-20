<?php

namespace App\Models;
use App\Models\Trabalho;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;
    protected $table="servico";
    protected $fillabble=['nome','dtInicio','dtFim'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function trabalhos(){
        return $this->hasMany(Trabalho::class);
    }
}
