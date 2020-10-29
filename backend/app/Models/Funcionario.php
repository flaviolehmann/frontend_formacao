<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $dates = ['data_aniversario'];
    protected $fillable = ['nome', 'data_aniversario', 'sexo', 'numero', 'rua', 'bairro', 'complemento', 'cidade',
        'uf', 'cep', 'cpf', 'salario', 'status', 'senha', 'cargo_id', 'filial_id'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    public $timestamps = false;

    public function filial()
    {
        return $this->belongsTo(Filial::class);
    }

    public function cargo()
    {
        return $this->hasOne(Cargo::class);
    }
}
