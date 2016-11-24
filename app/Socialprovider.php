<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Socialprovider extends Model
{
    protected $table='socialproviders';
    protected $fillable = [
        'user_id', 'provider_id', 'provider'
    ];
   function user(){
       return $this->belongsTo(User::class);
   }
}
