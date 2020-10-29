<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Automovel extends Model
{
    protected $fillable = ['nome', 'ano', 'cor', 'nr_chassi', 'modelo_id', 'categoria_id', 'filial_id'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    public $timestamps = false;

    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function filial()
    {
        return $this->belongsTo(Filial::class);
    }
}
