<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RespVerFal extends Model
{
    public static function Guardar($data, $fecha)
    {

        $Opc = DB::connection('mysql')->table('etno_ped.resp_pregverfal')
        ->where('pregunta', $data["Pregunta"])
            ->where('alumno', Auth::user()->id)
            ->first();
        if ($Opc) {
            $OpcDel = DB::connection('mysql')->table('etno_ped.resp_pregverfal')
            ->where('pregunta', $data["Pregunta"])
                ->where('alumno', Auth::user()->id)
                ->delete();
        }

        if (isset($data["radpregVerFal"])) {
            foreach ($data["radpregVerFal"] as $key2 => $val2) {
                $resp = $data["radpregVerFal"][$key2];
            }

            $respuestaVerFal = DB::connection('mysql')->table('etno_ped.resp_pregverfal')->insertGetId([
                'evaluacion' => $data["IdEvaluacion"],
                'alumno' => Auth::user()->id,
                'pregunta' => $data["Pregunta"],
                'respuesta_alumno' => $resp,
                'fecha' => $fecha,
            ]);

            $respuestaVerFal = DB::connection('mysql')->table('etno_ped.resp_pregverfal')->find($respuestaVerFal);
        }

        $respuesta = [
            'RegViejo' => $Opc,
            'RegNuevo' => $respuestaVerFal,
        ];

        return $respuesta;
    }
}
