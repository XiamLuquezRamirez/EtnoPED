<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RespEvalRelacione extends Model
{
    public static function Guardar($data, $fecha)
    {

        $Opc = DB::connection('mysql')->table('etno_ped.resp_pregrelacione')
            ->where('eval_preg', $data["Pregunta"])
            ->where('alumno', Auth::user()->id)
            ->get();

        $RespPreRel = DB::connection('mysql')->table('etno_ped.resp_pregrelacione')
            ->leftjoin('eval_relacione_def', 'resp_pregrelacione.pregunta', 'eval_relacione_def.id')
            ->leftjoin('eval_relacione_opc', 'resp_pregrelacione.respuesta_alumno', 'eval_relacione_opc.id')
            ->where('resp_pregrelacione.eval_preg', $data["Pregunta"])
            ->select('eval_relacione_def.opcion', 'eval_relacione_opc.correcta')
            ->get();

        $Opc2 = $RespPreRel;
      

        if ($Opc) {
            $OpcDel = DB::connection('mysql')->table('etno_ped.resp_pregrelacione')
                ->where('eval_preg', $data["Pregunta"])
                ->where('alumno', Auth::user()->id)
                ->delete();
        }

        foreach ($data["RespPreg"] as $key => $val) {
            $respuestaRelac = DB::connection('mysql')->table('etno_ped.resp_pregrelacione')->insertGetId([
                'evaluacion' => $data["IdEvaluacion"],
                'alumno' => Auth::user()->id,
                'pregunta' => $data["RespPreg"][$key],
                'respuesta_alumno' => $data["RespSelect"][$key],
                'fecha' => $fecha,
                'eval_preg' => $data["Pregunta"],
                'consecu' => $data["ConsPreg"][$key],
            ]);
        }

        $respuestaRelac = DB::connection('mysql')->table('etno_ped.resp_pregrelacione')
            ->where('resp_pregrelacione.eval_preg', $data["Pregunta"])
            ->where('resp_pregrelacione.alumno', Auth::user()->id)
            ->first();


        $respuesta = [
            'RegViejo' => $Opc2,
            'RegNuevo' => $respuestaRelac,
        ];

        return $respuesta;
    }

    public static function RelacResp($idPreg, $Est)
    {
        $DesVerFal = DB::connection('mysql')->table('etno_ped.resp_pregrelacione')
            ->where('resp_pregrelacione.eval_preg', $idPreg)
            ->where('resp_pregrelacione.alumno', $Est)
            ->get();
        return $DesVerFal;
    }
}
