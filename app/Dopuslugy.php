<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dopuslugy extends Model
{
    protected $table = 'dopuslugy';
    protected $fillable = ['name', 'cena'];

}
