<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zakaz extends Model
{
    protected $table='zakaz';
    protected $fillable = ['fio', 'auto_id', 'tel', 'email', 'prim', 'datn', 'datk'];
    protected $attributes = ['prim' => ''];
}
