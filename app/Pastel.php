<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pastel extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome', 'preço', 'foto',
    ];

    protected $dates = ['deleted_at'];
}
