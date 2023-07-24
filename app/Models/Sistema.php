<?php

namespace App\Models;
use App\Models\Funcionalidade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sistema extends Model
{
    use HasFactory;
    protected $table = 'sistema';
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = array(
        'nome'
    );
    public function funcionalidade(){
        return $this->hasMany(Funcionalidade::class);
    }
}
