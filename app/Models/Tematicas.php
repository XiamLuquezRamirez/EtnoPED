<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tematicas extends Model
{
    use HasFactory;

    public static function guardar($request)
    {
       $respuesta = DB::connection('mysql')->table('etno_ped.tematicas')->insertGetId([
            'titulo' => $request['titulo'],
            'unidad' => $request['unidad'],
            'contenido' => $request['contenido'],
            'estado' => 'ACTIVO'
        ]);

        return  $respuesta;
    }

    public static function guardarMultimediaTema($data){

        foreach ($data["img"] as $key => $val) {
            $respuesta = DB::connection('mysql')->table('etno_ped.multimedia_gramatica')->insert([
                        'tematica' => $data["id"],
                        'url_contenido' => $data["img"][$key],
                        'tipo_multimedia' => $data["tipo"][$key]
            ]);
        }
       return $respuesta;

    }
}
