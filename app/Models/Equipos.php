<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipos extends Model
{
    






     public function tipoequipo()
    {
        return $this->BelongsTo('App\Models\TipoEquipos','tipo_equipo_id');
    }


    



    public function getDisplayStatusAttribute()
    {
        return $this->status == 1 ? 'Equipo disponible' : 'No hay equipo en el inventario';
    }



    public function getEncodeIDAttribute()
    {
        return \Hashids::encode($this->id);
    }
}
