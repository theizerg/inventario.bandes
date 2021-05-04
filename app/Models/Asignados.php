<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignados extends Model
{
    

 

    public function equipos()
    {
        return $this->BelongsTo('App\Models\Equipos','equipo_id');
    }


    public function equipoconsumible()
    {
        return $this->BelongsTo('App\Models\EquiposConsumibles','equipo_id');
    }



    public function getDisplayStatusAttribute()
    {
        return $this->status == 1 ? 'Asignado' : 'Retirado';
    }
}
