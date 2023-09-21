<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EvalTaller extends Model
{
    public static function GuardarTallerArc($datos, $idEval)
    {

        $respuesta = DB::connection('mysql')->table('etno_ped.eval_taller')->insertGetId([
            'evaluacion' => $idEval,
            'nom_archivo' => $datos["archivo"],
            'puntaje' => $datos["puntaje"],
        ]);

        return $respuesta;
    }

    public static function PregTaller($id)
    {
        $PregTaller = DB::connection('mysql')->table('etno_ped.eval_taller')
            ->where('id', $id)
            ->first();
        return $PregTaller;
    }

    public static function ModifPreg($datos)
    {
        $respuesta = DB::connection('mysql')->table('etno_ped.eval_taller')->where('id', $datos['id-taller'])->update([
            'nom_archivo' => $datos["archivo"],
            'puntaje' => $datos["puntaje"],
        ]);
        return $respuesta;
    }

    public static function EliminarArch($id)
    {
        $Archi = DB::connection('mysql')->table('etno_ped.eval_taller')
            ->where('id', $id);
        $Archi->delete();
        return $Archi;
    }

    public static function PregTallerAll($id)
    {
        $PregTaller = DB::connection('mysql')->table('etno_ped.eval_taller')
            ->where('evaluacion', $id)
            ->get();
        return $PregTaller;
    }
}
