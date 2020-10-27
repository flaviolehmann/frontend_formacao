<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Funcionario extends Model
{
    // protected $dates = ['data_aniversario'];
    protected $fillable = ['nome', 'data_aniversario', 'sexo', 'numero', 'rua', 'bairro', 'complemento', 'cidade', 'uf', 'cep', 'cpf', 'salario', 'status', 'senha', 'cargo_id', 'filial_id'];
    protected $guarded = ['id', 'created_at', 'update_at'];

    public function filial()
    {
        return $this->belongsTo(Filial::class);
    }

    public function cargo()
    {
        return $this->hasOne(Cargo::class);
    }

    // Mutators

    public function setSenhaAttribute($value)
    {
        $this->attributes['senha'] = Hash::make($value);
    }
}
