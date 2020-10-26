<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Automovel extends Model
{
    protected $fillable = ['nome', 'ano', 'cor', 'nr_chassi', 'modelo_id', 'categoria_id', 'filial_id'];
    protected $guarded = ['id', 'created_at', 'update_at'];

    public function modelo()
    {
        return $this->hasOne(Modelo::class);
    }

    public function categoria()
    {
        return $this->hasOne(Categoria::class);
    }

    public function filial()
    {
        return $this->belongsTo(Filial::class);
    }

}
