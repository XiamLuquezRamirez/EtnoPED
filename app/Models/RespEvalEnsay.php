<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RespEvalEnsay extends Model
{

    public static function Guardar($DetPreg, $datos, $fecha)
    {
        $idEval = $datos['IdEvaluacion'];
        $punt_max = $DetPreg->puntaje;
        $Text_Respt = $datos['RespPregEns'];
        if ($Text_Respt == null) {
            $Text_Respt = "Esta Evaluación no fue Resuelta...";
        }

        $Opc = DB::connection('mysql')->table('etno_ped.resp_evalpregensayo')
            ->where('pregunta', $datos['Pregunta'])
            ->where('alumno', Auth::user()->id)
            ->first();
          
        if ($Opc) {
            $DelOpc = DB::connection('mysql')->table('etno_ped.resp_evalpregensayo')
            ->where('pregunta', $datos['Pregunta'])
            ->where('alumno', Auth::user()->id)
            ->delete();
        }

        $RespEnsayo =  DB::connection('mysql')->table('etno_ped.resp_evalpregensayo')->insertGetId([
            'alumno' => Auth::user()->id,
            'evaluacion' => $idEval,
            'pregunta' => $datos['Pregunta'],
            'respuesta' => $Text_Respt,
            'fecha' => $fecha,
            'evaluada' => 'NO',
            'calificacion' => '0/' . $punt_max,
            'califvisible' => '0/' . $punt_max
        ]);

        $RespEnsayo = DB::connection('mysql')->table('etno_ped.resp_evalpregensayo')->find($RespEnsayo);

        $respuesta = [
            'RegViejo' => $Opc,
            'RegNuevo' => $RespEnsayo
        ];

        return $respuesta;
    }

    public static function DesResp($Preg, $Est)
    {
        $DesEval = DB::connection('mysql')->table('etno_ped.resp_evalpregensayo')
            ->where('pregunta', $Preg)
            ->where('alumno', $Est)
            ->first();
        return $DesEval;
    }
}
