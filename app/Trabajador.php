<?php

namespace CrudTrabajador;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trabajador extends Model
{
    use SoftDeletes;
    protected $table = 'trabajador';
    protected $fillable = ['cedula','nombre','apellido','correo','estatus','idcargo'];
    protected $dates = ['deleted_at'];
}
