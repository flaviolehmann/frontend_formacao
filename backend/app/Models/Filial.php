<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{
    protected $fillable = ['nome', 'numero', 'rua', 'bairro', 'complemento', 'cidade', 'uf', 'cep', 'inscricao_estadual', 'cnpj'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    public $timestamps = false;

    public function automoveis()
    {
        return $this->hasMany(Automovel::class);
    }

    public function funcionarios()
    {
        return $this->hasMany(Funcionario::class);
    }

}
