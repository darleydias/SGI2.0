<?php

namespace App\Models;
use App\Models\Grupo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionalidade extends Model
{
    use HasFactory;
    protected $table = 'funcionalidade';
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = array(
        'nome',
        'URL',
        'menu',
        'funcionalidade_id',
        'sistema_id'
    );

    public function grupo(){
        return $this->belongsToMany(Grupo::class,'funcionalidade_grupo');
    }

    public function sistema(){
        return $this->belongsTo(Sistema::class);
    } 
}
