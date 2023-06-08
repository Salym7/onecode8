<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    public $incrementing = false;

    public $fillable = [
        'id', 'name',
    ];

    // protected $hidden = [
    //     'price',
    // ];

    // protected $casts = [
    //     'price' => 'float',
    //     'active' => 'boolean',
    //     'sort' => 'integer',
    //     'secret' => 'encrypted',
    // ];
}
