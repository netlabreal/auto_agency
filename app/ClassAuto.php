<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassAuto extends Model
{
    protected $table = 'class_auto';
    protected $fillable=['name'];

    // Возвращает список авто, связанных с этим классом
    public function all_auto(){

        return $this->belongsToMany(Auto::class, 'cl_vs_auto');
    }
}
