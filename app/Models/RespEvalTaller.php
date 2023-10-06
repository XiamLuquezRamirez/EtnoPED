<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RespEvalTaller extends Model
{

    public static function Guardar($DetEval, $archivo, $fecha)
    {
        $idPreg = $DetEval->id;
        $punt_max = $DetEval->puntaje;
        $idEval = $DetEval->evaluacion;

        $Opc = DB::connection('mysql')->table('etno_ped.resp_evaltaller')
            ->where('pregunta', $idPreg)
            ->where('alumno', Auth::user()->id)
            ->first();
        if ($Opc) {
            $OpcDel = DB::connection('mysql')->table('etno_ped.resp_evaltaller')
                ->where('pregunta', $idPreg)
                ->where('alumno', Auth::user()->id)
                ->delete();
        }

        $respuestataller = DB::connection('mysql')->table('etno_ped.resp_evaltaller')->insertGetId([
            'alumno' => Auth::user()->id,
            'evaluacion' => $idEval,
            'archivo' => $archivo,
            'fecha' => $fecha,
            'evaluada' => 'NO',
            'calificacion' => '0/' . $punt_max,
            'califvisible' => '0/' . $punt_max,
            'pregunta' => $idPreg,
        ]);

        $respuestataller = DB::connection('mysql')->table('etno_ped.resp_evaltaller')->find($respuestataller);


        $respuesta = [
            'RegViejo' => $Opc,
            'RegNuevo' => $respuestataller
        ];


        return $respuesta;
    }

    public static function RespEvalTallerAlum($idPreg, $Est)
    {
        $DesVerFal = DB::connection('mysql')->table('etno_ped.resp_evaltaller')
            ->where('resp_evaltaller.pregunta', $idPreg)
            ->where('resp_evaltaller.alumno', $Est)
            ->first();
        return $DesVerFal;
    }
}
