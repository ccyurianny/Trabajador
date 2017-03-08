<?php

namespace CrudTrabajador;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cargo extends Model
{
    use SoftDeletes;
    protected $table = 'cargo';
    protected $fillable = ['nombre'];
    protected $dates = ['deleted_at'];

    public function trabajador()
    {
        return $this->hasOne(Trabajador::class, 'idcargo');
    }
}
