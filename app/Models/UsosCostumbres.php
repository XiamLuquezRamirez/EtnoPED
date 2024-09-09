<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsosCostumbres extends Model
{
    use HasFactory;
    public static function guardar($request)
    {
        $respuesta = DB::connection('mysql')->table('etno_ped.usos_costumbres')->insertGetId([
            'nombre' => $request['titulo'],
            'descripcion' => $request['contenidoEdit'],
            'url_video' => $request['Video'],
            'estado' => 'ACTIVO'
        ]);

        return  $respuesta;
    }

    public static function AllUso()
    {
        return DB::connection('mysql')->table('etno_ped.usos_costumbres')
            ->where('estado', 'ACTIVO')
            ->get();
    }

    public static function modificar($request)
    {
        $respuesta = DB::connection('mysql')->table('etno_ped.usos_costumbres')->where('id', $request['id'])->update([
            'nombre' => $request['titulo'],
            'descripcion' => $request['contenidoEdit'],
            'url_video' => $request['Video']
        ]);
        return  "ok";
    }


    public static function BuscarUso($id){
        return DB::connection('mysql')->table('etno_ped.usos_costumbres')
        ->where('id', $id)
        ->first();
    }

    public static function Eliminar($id)
    {

        $VerfDel = DB::connection('mysql')->table('etno_ped.usos_costumbres')->where('id', $id)
        ->where('id', '<=', 27)
        ->get();
        if($VerfDel->count() == 0){
        return DB::connection('mysql')->table('etno_ped.usos_costumbres')->where('id', $id)->update([
            'estado' => 'ELIMINADO',
        ]);
    }else{
        return "no";
    }
    }
}
