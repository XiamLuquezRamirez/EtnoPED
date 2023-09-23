<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Evaluacion extends Model
{
    public static function Guardar($datos, $calxdoc)
    {
        if ($datos["Punt_Max"] == null || $datos["Punt_Max"] == "0") {
            $datos["Punt_Max"] = "10";
        }

        $respuesta = DB::connection('mysql')->table('etno_ped.evaluaciones')->insertGetId([
            'tematica' => $datos['tema_id'],
            'titulo' => $datos['titulo'],
            'intentos_perm' => $datos['cb_intentosPer'],
            'calif_usando' => $datos['cb_CalUsando'],
            'punt_max' => $datos['Punt_Max'],
            'estado' => 'INACTIVO',
            'enunciado' => $datos['enunciado'],
            'calxdoc' => $calxdoc
        ]);
        return $respuesta;
    }

    public static function ModifEval($datos, $id, $calxdoc)
    {

        $respuesta = DB::connection('mysql')->table('etno_ped.evaluaciones')->where('id', $id)->update([
            'tematica' => $datos['tema_id'],
            'titulo' => $datos['titulo'],
            'intentos_perm' => $datos['cb_intentosPer'],
            'calif_usando' => $datos['cb_CalUsando'],
            'punt_max' => $datos['Punt_Max'],
            'enunciado' => $datos['enunciado'],
            'calxdoc' => $calxdoc
        ]);

        return $respuesta;
    }

    public static function ModifEvalCalxDoc($id, $calxdoc)
    {
        $respuesta = DB::connection('mysql')->table('etno_ped.evaluaciones')->where('id', $id)->update([
            'calxdoc' => $calxdoc,
        ]);

        return $respuesta;
    }

    public static function ModifEvalFin($datos, $id)
    {

        $respuesta = DB::connection('mysql')->table('etno_ped.evaluaciones')->where('id', $id)->update([
            'titulo' => $datos['titulo'],
            'intentos_perm' => $datos['cb_intentosPer'],
            'calif_usando' => $datos['cb_CalUsando'],
            'punt_max' => $datos['Punt_Max'],
            'estado' => 'ACTIVO',
            'enunciado' => $datos['enunciado']
        ]);

        return $respuesta;
    }

    public static function VerfDel($id)
    {

        $VerfDel = DB::connection('mysql')->table('etno_ped.evaluaciones')
            ->where('id', $id)
            ->where('id', '>=', 1)
            ->where('id', '<=', 30)
            ->get();

        return $VerfDel;
    }

    public static function editarestado($id, $estado)
    {
        $respuesta = DB::connection('mysql')->table('etno_ped.evaluaciones')->where('id', $id)->update([
            'estado' => $estado,
        ]);
        return $respuesta;
    }

    public static function BusEval($id)
    {
        return DB::connection('mysql')->table('etno_ped.evaluaciones')
            ->where('id', $id)
            ->first();
    }
}
