<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PregRelacione extends Model
{
    public static function Guardar($datos, $eval)
    {
        $respuesta = DB::connection('mysql')->table('etno_ped.eval_relacione')->insertGetId([
            'evaluacion' => $eval,
            'enunciado' => $datos['EnuncRelacione'],
            'puntaje' => $datos['puntaje'],
        ]);
        return $respuesta;
    }

    public static function Modificar($datos)
    {
        $respuesta = DB::connection('mysql')->table('etno_ped.eval_relacione')
        ->where('id', $datos['id-relacione'])
        ->update([
            'enunciado' => $datos['EnuncRelacione'],
            'puntaje' => $datos['puntaje'],
        ]);
        return $respuesta;
    }

    public static function ConRela($id)
    {
        $PregRelacione = DB::connection('mysql')->table('etno_ped.eval_relacione')
            ->where('id', $id)
            ->first();
        return $PregRelacione;
    }

    public static function ConRelaAll($id)
    {
        $PregRelacione = DB::connection('mysql')->table('etno_ped.eval_relacione')
            ->where('evaluacion', $id)
            ->get();
        return $PregRelacione;
    }

    public static function DelPreg($id){
        $Opc = DB::connection('mysql')->table('etno_ped.eval_relacione')
        ->where('id', $id);
        $Opc->delete();
    }
}
