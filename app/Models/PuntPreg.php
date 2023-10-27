<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PuntPreg extends Model
{
    public static function Guardar($eval, $preg, $puntos)
    {

        $Opc = DB::connection('mysql')->table('etno_ped.puntuacion_preguntas')
            ->where('pregunta', $preg)
            ->where('alumno', Auth::user()->id)
            ->first();
        if ($Opc) {
            $Opc = DB::connection('mysql')->table('etno_ped.puntuacion_preguntas')
                ->where('pregunta', $preg)
                ->where('alumno', Auth::user()->id)
                ->delete();
        }

        $Puntuacion = DB::connection('mysql')->table('etno_ped.puntuacion_preguntas')->insertGetId([
            'evaluacion' => $eval,
            'pregunta' => $preg,
            'alumno' => Auth::user()->id,
            'puntos' => $puntos,
        ]);

        $Puntuacion = DB::connection('mysql')->table('etno_ped.puntuacion_preguntas')->find($Puntuacion);
        return $Puntuacion;
    }

    public static function ConsulPuntEval($eval, $alum)
    {
        $Opc = DB::connection('mysql')->table('etno_ped.puntuacion_preguntas')
            ->where('evaluacion', $eval)
            ->where('alumno', $alum)
            ->get();
        return $Opc;
    }

    public static function ConsulPunt($preg, $alum)
    {
        $Opc = DB::connection('mysql')->table('etno_ped.puntuacion_preguntas')
            ->where('pregunta', $preg)
            ->where('alumno', $alum)
            ->first();
        return $Opc;
    }

    public static function UpdatePuntPreg($Eval, $Pregunta, $Alumno, $Puntaje)
    {



        $respuesta = DB::connection('mysql')->table('etno_ped.puntuacion_preguntas')
            ->where('evaluacion', $Eval)
            ->where('pregunta', $Pregunta)
            ->where('alumno', $Alumno)
            ->update([
                'puntos' => $Puntaje
            ]);


        return $respuesta;
    }
}
