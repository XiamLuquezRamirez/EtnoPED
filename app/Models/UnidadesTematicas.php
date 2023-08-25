<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UnidadesTematicas extends Model
{
    use HasFactory;

    public static function guardar($request){
      return DB::connection('mysql')->table('etno_ped.unidades_tematicas')->insert([
            'nombre' => $request['nombre'],
            'descripcion' => $request['descripcion'],
            'estado' =>'ACTIVO',
        ]);

    }

    public static function CargarTodos(){
        return DB::connection('mysql')->table('etno_ped.unidades_tematicas')->get();
    }
}
