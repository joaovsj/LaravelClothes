<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    // retorna numero de produtos
    public function products(){
        // categorias tem muitos produtos(Model do Produto, chave estrangeira, chave local)
        return $this->hasMany(Produto::class, 'id_category', 'id');
    }
}
