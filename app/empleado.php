<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class empleado extends Model
{

    Use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable=['codigo','nombre','apellidopaterno','apellidomaterno','email','contrato','salario','direccion','telefono'];


}
