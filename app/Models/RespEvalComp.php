<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RespEvalComp extends Model
{

    public static function Guardar($DetPreg,$datos, $fecha)
    {
        $idEval = $datos['IdEvaluacion'];
        $punt_max = $DetPreg->puntaje;

        $Opc = DB::connection('mysql')->table('etno_ped.resp_evalpregcomp')
        ->where('pregunta',  $datos['Pregunta'])
            ->where('alumno', Auth::user()->id)
            ->first();
           
            if ($Opc) {
                $OpcPreg = DB::connection('mysql')->table('etno_ped.resp_evalpregcomp')
                ->where('pregunta',  $datos['Pregunta'])
                ->where('alumno', Auth::user()->id)
                ->delete();
            }   

        $RespComplete = DB::connection('mysql')->table('etno_ped.resp_evalpregcomp')->insertGetId([
            'alumno' => Auth::user()->id,
            'evaluacion' => $idEval,
            'pregunta' =>  $datos['Pregunta'],
            'respuesta' =>  $datos['RespPregComplete'],
            'fecha' => $fecha,
            'evaluada' => 'NO',
            'calificacion' => '0/' . $punt_max,
            'califvisible' => '0/' . $punt_max,
        ]);

        $RespComplete = DB::connection('mysql')->table('etno_ped.resp_evalpregcomp')->find($RespComplete);


        $respuesta =[
            'RegViejo' => $Opc,
            'RegNuevo' =>$RespComplete
        ];

        return $respuesta;

    }

    public static function DesResp($Preg, $Est)
    {
        $DesEval = DB::connection('mysql')->table('etno_ped.resp_evalpregcomp')
        ->where('pregunta', $Preg)
            ->where('alumno', $Est)
            ->first();
        return $DesEval;

    }
}
