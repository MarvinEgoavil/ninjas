<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class misiones extends Model
{
    protected $table = "misiones";

    protected $filliable = [
        'description', 'cantidad_ninjas', 'prioridad', 'pago', 'estado', 'fecha_finalizacion', 'cliente_id'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public function cliente()
    {
        return $this->belongsTo('App\Models\clientes');
    }
}
