<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agendar extends Model
{
    protected $fillable = [
        'date', 'time', 'id_user',
    ];

    public function user(){
        return $this->hasMany(User::class);
    }
}
