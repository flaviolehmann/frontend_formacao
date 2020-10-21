<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $fillable = ['descricao'];
    protected $guarded = ['id', 'created_at', 'update_at'];
}
