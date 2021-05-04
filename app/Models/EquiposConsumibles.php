<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquiposConsumibles extends Model
{
    



     public function getDisplayStatusAttribute()
    {
        return $this->status == 1 ? 'Equipo disponible' : 'No hay equipo en el inventario';
    }



    public function getEncodeIDAttribute()
    {
        return \Hashids::encode($this->id);
    }
}
