<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'id_user','nome_fantasia','cnpj','cep','telefone','email',
   ];

   public function users()
   {
       return $this->belongsToMany(User::class);
   }
}
