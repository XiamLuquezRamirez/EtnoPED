<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EvalVerFal extends Model
{
    public static function Guardar($data, $idEval)
    {
        foreach ($data["radpregVerFal"] as $key2 => $val2) {
            $resp = $data["radpregVerFal"][$key2];
        }

        $respuesta = DB::connection('mysql')->table('etno_ped.eval_verfal')->insertGetId([
            'evaluacion' => $idEval,
            'pregunta' => $data["pregverdFals"],
            'respuesta' => $resp,
            'puntaje' => $data["puntaje"],
        ]);
        return $respuesta;
    }

    public static function ModifPreg($data)
    {
        foreach ($data["radpregVerFal"] as $key2 => $val2) {
            $resp = $data["radpregVerFal"][$key2];
        }
        $respuesta = DB::connection('mysql')->table('etno_ped.eval_verfal')->where('id', $data['id-pregverfal'])->update([
            'pregunta' => $data["pregverdFals"],
            'respuesta' => $resp,
            'puntaje' => $data["puntaje"],
        ]);

        return $respuesta;
    }

    public static function ConVerFal($id)
    {
        $PregVerFal = DB::connection('mysql')->table('etno_ped.eval_verfal')
            ->where('id', $id)
            ->first();
        return $PregVerFal;
    }

    public static function DelPreg($id){
        $Opc = DB::connection('mysql')->table('etno_ped.eval_verfal')
        ->where('id', $id);
        $Opc->delete();
    }

    public static function VerFal($id)
    {
        $PregVerFal = DB::connection('mysql')->table('etno_ped.eval_verfal')
        ->where('evaluacion', $id)
            ->get();
        return $PregVerFal;
    }

    public static function VerFalResp($id,$Est)
    {
        $DesVerFal = DB::connection('mysql')->table('etno_ped.eval_verfal')
            ->join('resp_pregverfal', 'resp_pregverfal.pregunta', 'eval_verfal.id')
            ->select('resp_pregverfal.pregunta', 'resp_pregverfal.respuesta_alumno', 'eval_verfal.respuesta', 'eval_verfal.puntaje')
            ->where('resp_pregverfal.pregunta', $id)
            ->where('resp_pregverfal.alumno', $Est)
            ->first();
        return $DesVerFal;
    }
}
