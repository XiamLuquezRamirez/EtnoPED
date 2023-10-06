<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

    public static function DatosEvla($id)
    {
  
        $evaluacion = DB::connection('mysql')->table('etno_ped.evaluaciones')
            ->join('etno_ped.tematicas', 'etno_ped.tematicas.id', 'etno_ped.evaluaciones.tematica');

        if (Auth::user()->tipo_usuario == "Estudiante") {
            $evaluacion->select(
                'etno_ped.tematicas.titulo',
                'etno_ped.evaluaciones.intentos_perm',
                'etno_ped.evaluaciones.calif_usando',
                'etno_ped.evaluaciones.punt_max',
                'etno_ped.evaluaciones.tiempo',
                'etno_ped.evaluaciones.id',
                'etno_ped.evaluaciones.calxdoc',
                'etno_ped.evaluaciones.hab_tiempo',
                'etno_ped.eval_intentos.int_realizados'
            );
            $evaluacion->leftJoin('etno_ped.eval_intentos', function ($join) use ($id) {
                $join->on('etno_ped.eval_intentos.evaluacion', '=', 'etno_ped.evaluaciones.id')
                    ->where('etno_ped.eval_intentos.alumnos', Auth::user()->id);
            });
        } else {
            $evaluacion->select(
                'etno_ped.tematicas.titulo',
                'etno_ped.evaluaciones.intentos_perm',
                'etno_ped.evaluaciones.calif_usando',
                'etno_ped.evaluaciones.punt_max',
                'etno_ped.evaluaciones.tiempo',
                'etno_ped.evaluaciones.id',
                'etno_ped.evaluaciones.calxdoc',
                'etno_ped.evaluaciones.hab_tiempo'
            );
        }
    

        $resultado = $evaluacion->where('etno_ped.evaluaciones.id', $id)
            ->first();
           
        return  $resultado;
    }

    public static function allEvaluacion($idTema)
    {
        return DB::connection('mysql')->table('etno_ped.evaluaciones')
            ->where('estado', 'ACTIVO')
            ->where('tematica', $idTema)
            ->get();
    }
    public static function allEvaluacionEst($idTema)
    {
        return DB::connection('mysql')->select("SELECT eval.*, lib.estado_eval FROM etno_ped.evaluaciones eval
        LEFT JOIN etno_ped.libro_calificaciones lib ON eval.id=lib.evaluacion AND lib.alumno=" . Auth::user()->id . " WHERE eval.tematica=" . $idTema . " AND evaL.estado='ACTIVO'");
    }
}
