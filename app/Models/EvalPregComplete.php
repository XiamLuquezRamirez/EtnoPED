<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class EvalPregComplete extends Model
{
    public static function Guardar($datos, $eval) {

        $respuesta = DB::connection('mysql')->table('etno_ped.eval_complete')->insertGetId([
                    'evaluacion' => $eval,
                    'opciones' => $datos['cb_Opciones'],
                    'parrafo' => $datos['pregEditComplete'],
                    'puntaje' => $datos['puntaje']
        ]);
        return $respuesta;
    }


    public static function ConsultComplete($id) {
        return DB::connection('mysql')->table('etno_ped.eval_complete')
        ->where('id', $id)
                ->first();
    }

    public static function Modificar($datos) {
        $respuesta = DB::connection('mysql')->table('etno_ped.eval_complete')->where('evaluacion', $datos['Id_Eval'])->update([
            'opciones' => $datos['cb_Opciones'],
            'parrafo' => $datos['pregEditComplete']
        ]);
        return $respuesta;
    }

    public static function DelPreg($id){
        return DB::connection('mysql')->table('etno_ped.eval_complete')
        ->where('id', $id)
        ->delete();
    }

    public static function ConsultCompleteAll($id) {
        $DesEval = DB::connection('mysql')->table('etno_ped.eval_complete')
        ->where('evaluacion', $id)
                ->get();
        return $DesEval;
    }
}
