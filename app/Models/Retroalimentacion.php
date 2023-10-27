<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Retroalimentacion extends Model
{

    public static function guardar($Eval, $Pregunta, $Alumno, $Retro)
    {

        $retro = DB::connection('mysql')->table('etno_ped.retroalimentacion')
            ->where('alumno', $Alumno)
            ->where('pregunta', $Pregunta)
            ->first();

        if ($retro) {
            $Retroalimentacion = DB::connection('mysql')->table('etno_ped.retroalimentacion')
                ->where('pregunta', $Pregunta)
                ->where('alumno', $Alumno)
                ->update([
                    'evaluacion' => $Eval,
                    'pregunta' => $Pregunta,
                    'alumno' => $Alumno,
                    'retro' => $Retro
                ]);
        } else {
            $Retroalimentacion = DB::connection('mysql')->table('etno_ped.retroalimentacion')->insertGetId([
                'evaluacion' => $Eval,
                'pregunta' => $Pregunta,
                'alumno' => $Alumno,
                'retro' => $Retro
            ]);

        }


        return $Retroalimentacion;
    }

    public static function ConsulRetro($preg, $alum)
    {
        $Retro = DB::connection('mysql')->table('etno_ped.retroalimentacion')
            ->where('pregunta', $preg)
            ->where('alumno', $alum)
            ->first();

        if ($Retro) {
            return $Retro->retro;
        } else {
            return "";
        }
    }
}
