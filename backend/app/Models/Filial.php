<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{
    protected $fillable = ['nome', 'numero', 'rua', 'bairro', 'complemento', 'cidade', 'uf', 'cep', 'inscricao_estadual', 'cnpj'];
    protected $guarded = ['id', 'created_at', 'update_at'];
<<<<<<< HEAD
    public $timestamps = false;
=======
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d

    public function automoveis()
    {
        return $this->hasMany(Automovel::class);
    }

    public function funcionarios()
    {
        return $this->hasMany(Funcionario::class);
    }

}
