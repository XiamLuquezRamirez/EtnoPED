<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RespMultPreg extends Model
{
    public static function Guardar($data, $fecha)
    {
        $Opc = DB::connection('mysql')->table('etno_ped.resp_pregmultiple')
            ->where('pregunta', $data["Pregunta"])
            ->where('alumno', Auth::user()->id)
            ->first();
        if ($Opc) {

            $OpcDel = DB::connection('mysql')->table('etno_ped.resp_pregmultiple')
                ->where('pregunta', $data["Pregunta"])
                ->where('alumno', Auth::user()->id)
                ->delete();
        }

        foreach ($data["Opciones"] as $key => $val) {
            if ($data["OpcionSel"][$key] == "si") {

                $grupPre =  DB::connection('mysql')->table('etno_ped.resp_pregmultiple')->insertGetId([
                    'alumno' => Auth::user()->id,
                    'evaluacion' => $data["IdEvaluacion"],
                    'pregunta' => $data["PreguntaOpc"],
                    'respuesta' => $data["Opciones"][$key],
                    'fecha' => $fecha,
                ]);
                $grupPre = DB::connection('mysql')->table('etno_ped.resp_pregmultiple')->find($grupPre);
            }
        }



        $respuesta = [
            'RegViejo' => $Opc,
            'RegNuevo' => $grupPre
        ];

        return $respuesta;
    }
}
