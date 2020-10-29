<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Automovel extends Model
{
    protected $fillable = ['nome', 'ano', 'cor', 'nr_chassi', 'modelo_id', 'categoria_id', 'filial_id'];
    protected $guarded = ['id', 'created_at', 'update_at'];
<<<<<<< HEAD
    public $timestamps = false;

    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
=======
    // protected $table = 'automoveis';

    public function modelo()
    {
        return $this->hasOne(Modelo::class);
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
    }

    public function categoria()
    {
<<<<<<< HEAD
        return $this->belongsTo(Categoria::class);
=======
        return $this->hasOne(Categoria::class);
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
    }

    public function filial()
    {
        return $this->belongsTo(Filial::class);
    }
<<<<<<< HEAD

=======
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
}
