<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EvalPregEnsay extends Model
{
    public static function Guardar($datos, $eval)
    {
        $respuesta = DB::connection('mysql')->table('etno_ped.eval_pregensayo')->insertGetId([
            'evaluacion' => $eval,
            'pregunta' => $datos['pregEnsayo'],
            'puntaje' => $datos['puntaje']
        ]);
        return $respuesta;
    }

    public static function ModifPreg($datos)
    {
        $respuesta = DB::connection('mysql')->table('etno_ped.eval_pregensayo')->where('id', $datos['id-pregensay'])->update([
            'pregunta' => $datos['pregEnsayo'],
            'puntaje' => $datos['puntaje']
        ]);
        return $respuesta;
    }

    public static function consulPregEnsay($id)
    {
        return DB::connection('mysql')->table('etno_ped.eval_pregensayo')
            ->where('id', $id)
            ->first();
    }

    public static function DelPreg($id){
        return DB::connection('mysql')->table('etno_ped.eval_pregensayo')
        ->where('id', $id)
        ->delete();
    }

}
