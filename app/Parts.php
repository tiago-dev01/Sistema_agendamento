<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parts extends Model
{
    protected $fillable = [
         'part_name', 'price','amount_stock',
    ];
}
