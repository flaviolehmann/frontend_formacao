<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['descricao'];
    protected $guarded = ['id', 'created_at', 'update_at'];
<<<<<<< HEAD
=======

>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
    public $timestamps = false;
}
