<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Multimedia extends Model
{
    public static function guardar($request)
    {
        $respuesta = DB::connection('mysql')->table('etno_ped.contenido_multimedia')->insertGetId([
            'modulo' => $request['moduloMultimedia'],
            'titulo' => $request['tituloMultimedia'],
            'url' => $request['Video']
        ]);

        return  $respuesta;
    }

    public static function BuscarMult($id)
    {
        return DB::connection('mysql')->table('etno_ped.contenido_multimedia')
            ->where('id', $id)
            ->first();
    }


    public static function modificar($request)
    {
        $respuesta = DB::connection('mysql')->table('etno_ped.contenido_multimedia')->where('id', $request['id'])->update([
            'modulo' => $request['moduloMultimedia'],
            'titulo' => $request['tituloMultimedia'],
            'url' => $request['Video']
        ]);
        return  "ok";
    }

    public static function Eliminar($id){
        return DB::connection('mysql')->table('etno_ped.contenido_multimedia')
        ->where('id', $id)
        ->delete();
    }

}
