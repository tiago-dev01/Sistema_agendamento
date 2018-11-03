<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    protected $fillable = [
        'ordem_servicoID','id_user', 'id_parts',
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
